<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use App\Models\StockMovement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index(){
        $notifications = Auth::user()->notifications;
        Session::put('notifications', $notifications);

        $devise = Auth::user()->gestionnaire->etablissement->devise;
            Session::put('devise', $devise);
            $etablissement = Auth::user()->gestionnaire->etablissement->id;
        if(Auth::user()->hasRole('administrateur')){
            $movements = StockMovement::where('etablissement_id', $etablissement)->latest()->limit(4)->get();
            $factures = Commande::where('etablissement_id', $etablissement)->latest()->limit(5)->get();
        }else{
            $movements = StockMovement::where('etablissement_id', $etablissement)
                                ->where('user_id', Auth::user()->id)
                                ->latest()
                                ->limit(4)
                                ->get();
            $factures = Commande::where('etablissement_id', $etablissement)
                                ->where('gestionnaire_id', Auth::user()->gestionnaire->id)
                                ->latest()
                                ->limit(5)
                                ->get();
        }
        return view('index', [
            'movements' => $movements,
            'factures' => $factures,
        ]);
    }

    public function recenteVente(){
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $date_30_jours = Carbon::now()->subDays(30);
        $commandes_recentes = Commande::select(DB::raw('DATE(updated_at) as date'), DB::raw('SUM(montant_total) as total'))
            ->where('etablissement_id', $etablissement)
            ->where('updated_at', '>=', $date_30_jours)
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        return response()->json($commandes_recentes);
    }

    public function totalVenteMois() {
        $etablissement = Auth::user()->gestionnaire->etablissement->id;

        $date_debut = Carbon::now()->startOfMonth();
        $date_fin = Carbon::now()->endOfMonth();

        $date_debut_mois_precedent = Carbon::now()->subMonth()->startOfMonth();
        $date_fin_mois_precedent = Carbon::now()->subMonth()->endOfMonth();

        $vente_mois_en_cours = Commande::where('etablissement_id', $etablissement)
            ->whereBetween('updated_at', [$date_debut, $date_fin])
            ->sum('montant_total');

        $vente_mois_precedent = Commande::where('etablissement_id', $etablissement)
            ->whereBetween('updated_at', [$date_debut_mois_precedent, $date_fin_mois_precedent])
            ->sum('montant_total');

        $pourcentage_variation = 0;
        if ($vente_mois_precedent != 0) {
            $pourcentage_variation = (($vente_mois_en_cours - $vente_mois_precedent) / $vente_mois_precedent) * 100;
        }

        // Formater la moyenne et le pourcentage de variation
        $moyenne = number_format($vente_mois_en_cours, 2, '.', ' ');
        $pourcentage_variation_format = number_format($pourcentage_variation, 2, '.', ' ');

        return response()->json([
            'vente' => $moyenne,
            'difference' => $pourcentage_variation_format,
            'devise' => session('devise'),
        ]);
    }


    public function getAllVenteAnnee(){
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $annee_en_cours = Carbon::now()->year;
        $somme_vente_par_mois = [];

        for ($mois = 1; $mois <= 12; $mois++) {
            $somme_vente = Commande::where('etablissement_id', $etablissement)
                ->whereYear('updated_at', $annee_en_cours)
                ->whereMonth('updated_at', $mois)
                ->sum('montant_total');

            // Ajouter la somme des ventes au tableau, en utilisant le nom du mois comme clé
            $nom_mois = Carbon::create($annee_en_cours, $mois, 1)->monthName;
            $somme_vente_par_mois[$nom_mois] = $somme_vente;
        }

    // Retourner les données dans le format requis
        return response()->json([
            'series' => array_values($somme_vente_par_mois),
            'labels' => array_keys($somme_vente_par_mois)
        ]);
    }

    public function mostSelled(){
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $produit_plus_vendu = Produit::select('produits.nom',
                DB::raw('SUM(ligne_commandes.quantite) as total_vendu'))
                ->where('etablissement_id', $etablissement)
                ->join('ligne_commandes', 'produits.id', '=',
                'ligne_commandes.produit_id')
                ->groupBy('produits.nom')
                ->orderByDesc('total_vendu')
                ->first();

        if ($produit_plus_vendu){
            $nom_produit = $produit_plus_vendu->nom;
            $total_vendu = $produit_plus_vendu->total_vendu;
        }

        return response()->json([
            'produit' => $nom_produit,
            'quantite' => $total_vendu,
            'evolution' => 'coming soon'
        ]);
    }


}
