<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Portefeuille;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class FinanceController extends Controller
{
    public function index(){

        $totalJour = $this->sommeMontantTotalJour();
        $totalSemaine = $this->sommeMontantTotalSemaine();
        $totalMois = $this->sommeMontantTotalMois();
        $totalTrimestre = $this->sommeMontantTotalTrimestre();
        $totalAnnee = $this->sommeMontantTotalAnnee();
        $etat_actuelle = $this->etatPorteuille();

        return view('pages.finance', [
            'totalJour' => $totalJour,
            'totalSemaine' => $totalSemaine,
            'totalMois' => $totalMois,
            'totalTrimestre' => $totalTrimestre,
            'totalAnnee' => $totalAnnee,
            'etat_actuelle' => $etat_actuelle,
        ]);
    }

    public function sommeMontantTotalJour()
    {
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $total = Commande::where('etablissement_id', $etablissement)->whereDate('updated_at', now()->toDateString())
            ->sum('montant_total');

        return $total;
    }

    public function sommeMontantTotalSemaine()
    {
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $dateDebutSemaine = Carbon::now()->startOfWeek()->toDateString();
        $dateFinSemaine = Carbon::now()->endOfWeek()->toDateString();

        $total = Commande::where('etablissement_id', $etablissement)
                        ->whereBetween('updated_at', [$dateDebutSemaine, $dateFinSemaine])
                        ->sum('montant_total');
        return $total;
    }

    public function sommeMontantTotalMois()
    {
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $total = Commande::where('etablissement_id', $etablissement)
                        ->whereMonth('updated_at', now()->month)
                        ->whereYear('updated_at', now()->year)
                        ->sum('montant_total');
        return $total;
    }

    public function sommeMontantTotalTrimestre(){
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $trimestreDebut = now()->startOfQuarter()->toDateString();
        $trimestreFin = now()->endOfQuarter()->toDateString();

        $total = Commande::where('etablissement_id', $etablissement)->whereBetween('updated_at', [$trimestreDebut, $trimestreFin])
            ->sum('montant_total');

        return $total;
    }

    public function sommeMontantTotalAnnee()
    {
        if(Auth::user()->hasRole('administrateur')){
            $etablissement = Auth::user()->gestionnaire->etablissement->id;
            $total =Commande::where('etablissement_id', $etablissement)
                            ->whereYear('updated_at', now()->year)
                            ->sum('montant_total');
            return $total;
        }else{
            return 'vous n\'etes pas autorisé à voir cette info';
        }
    }

    public function sommeMontantTotalPeriodePersonnalisee(Request $request)
    {
        $etablissement = Auth::user()->gestionnaire->etablissement->id;

        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $start_date = Carbon::parse($request->start_date)->startOfDay();
        $end_date = Carbon::parse($request->end_date)->endOfDay();

        $total = Commande::where('etablissement_id', $etablissement)
                        ->whereBetween('updated_at', [$start_date, $end_date])
                        ->sum('montant_total');

        return $total;
    }

    public function etatPorteuille(){
        if(Auth::user()->hasRole('administrateur')){
            $etablissement = Auth::user()->gestionnaire->etablissement->id;
            $somme_entrees = Portefeuille::where('etablissement_id', $etablissement)
            ->where('type_transaction', 'entree_caisse')->sum('montant');

            $somme_sorties = Portefeuille::where('etablissement_id', $etablissement)
            ->where('type_transaction', 'sortie_caisse')->sum('montant');

            // Différence entre les sommes des entrées et des sorties
            $etat_portefeuille = $somme_entrees - $somme_sorties;

            return $etat_portefeuille;
        } else {
            return 'vous n\'etes pas autorisé à voir cette info';
        }
    }

    public function showPortefeuille(){
        return view('pages.finance-portefeuille');
    }

}
