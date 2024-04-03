<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;
use App\Models\Vente;
use Carbon\Carbon;

class FinanceController extends Controller
{
    public function index(){

        $totalJour = $this->sommeMontantTotalJour();
        $totalSemaine = $this->sommeMontantTotalSemaine();
        $totalMois = $this->sommeMontantTotalMois();
        $totalTrimestre = $this->sommeMontantTotalTrimestre();
        $totalAnnee = $this->sommeMontantTotalAnnee();

        return view('pages.finance', compact('totalJour', 'totalSemaine', 'totalMois', 'totalTrimestre', 'totalAnnee'));
    }

    public function sommeMontantTotalJour()
    {
        $total = Commande::whereDate('updated_at', now()->toDateString())
            ->sum('montant_total');

        return $total;
    }

    public function sommeMontantTotalSemaine()
    {
        $dateDebutSemaine = Carbon::now()->startOfWeek()->toDateString();
        $dateFinSemaine = Carbon::now()->endOfWeek()->toDateString();

        $total = Commande::whereBetween('updated_at', [$dateDebutSemaine, $dateFinSemaine])
                        ->sum('montant_total');
        return $total;
    }

    public function sommeMontantTotalMois()
    {
        $total = Commande::whereMonth('updated_at', now()->month)
                        ->whereYear('updated_at', now()->year)
                        ->sum('montant_total');
        return $total;
    }

    public function sommeMontantTotalTrimestre(){

        $trimestreDebut = now()->startOfQuarter()->toDateString();
        $trimestreFin = now()->endOfQuarter()->toDateString();

        $total = Commande::whereBetween('updated_at', [$trimestreDebut, $trimestreFin])
            ->sum('montant_total');

        return $total;
    }

    public function sommeMontantTotalAnnee()
    {
        $total =Commande::whereYear('updated_at', now()->year)
                        ->sum('montant_total');
        return $total;
    }

    public function sommeMontantTotalPeriodePersonnalisee(Request $request)
    {
        // Valider les données de la requête
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $start_date = Carbon::parse($request->start_date)->startOfDay();
        $end_date = Carbon::parse($request->end_date)->endOfDay();

        $total = Commande::whereBetween('updated_at', [$start_date, $end_date])
            ->sum('montant_total');

        return $total;
    }

}
