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
        $devise = Auth::user()->gestionnaire->etablissement->devise;
        Session::put('devise', $devise);

        $movements = StockMovement::latest()->limit(4)->get();
        $factures = Commande::latest()->limit(5)->get();

        return view('index', [
            'movements' => $movements,
            'factures' => $factures,
        ]);
    }

    public function recenteVente(){
        $date_30_jours = Carbon::now()->subDays(30);
        $commandes_recentes = Commande::select(DB::raw('DATE(updated_at) as date'), DB::raw('SUM(montant_total) as total'))
            ->where('updated_at', '>=', $date_30_jours)
            ->groupBy('date')
            ->orderBy('date')
            ->get();
        return response()->json($commandes_recentes);
    }

    public function totalVenteMois() {
        // Calculer la date de début et de fin du mois en cours
        $date_debut = Carbon::now()->startOfMonth();
        $date_fin = Carbon::now()->endOfMonth();

        // Calculer la date de début et de fin du mois précédent
        $date_debut_mois_precedent = Carbon::now()->subMonth()->startOfMonth();
        $date_fin_mois_precedent = Carbon::now()->subMonth()->endOfMonth();

        // Somme des ventes du mois en cours
        $vente_mois_en_cours = Commande::whereBetween('updated_at', [$date_debut, $date_fin])
            ->sum('montant_total');

        // Somme des ventes du mois précédent
        $vente_mois_precedent = Commande::whereBetween('updated_at', [$date_debut_mois_precedent, $date_fin_mois_precedent])
            ->sum('montant_total');

        // Calculer la différence en pourcentage entre les ventes du mois en cours et celles du mois précédent
        $pourcentage_variation = 0;
        if ($vente_mois_precedent != 0) {
            $pourcentage_variation = (($vente_mois_en_cours - $vente_mois_precedent) / $vente_mois_precedent) * 100;
        }

        // Formater la moyenne et le pourcentage de variation
        $moyenne = number_format($vente_mois_en_cours, 2, '.', ' ');
        $pourcentage_variation_format = number_format($pourcentage_variation, 2, '.', ' ');

        // Retourner les données au format JSON
        return response()->json([
            'vente' => $moyenne,
            'difference' => $pourcentage_variation_format,
            'devise' => session('devise'),
        ]);
    }


    public function getAllVenteAnnee(){
        // Déterminer l'année en cours
        $annee_en_cours = Carbon::now()->year;

        // Initialiser un tableau pour stocker la somme des ventes par mois
        $somme_vente_par_mois = [];

        // Boucler sur chaque mois de l'année en cours
        for ($mois = 1; $mois <= 12; $mois++) {
            // Calculer la somme des ventes pour le mois actuel
            $somme_vente = Commande::whereYear('updated_at', $annee_en_cours)
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
        $produit_plus_vendu = Produit::select('produits.nom',
                DB::raw('SUM(ligne_commandes.quantite) as total_vendu'))
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
