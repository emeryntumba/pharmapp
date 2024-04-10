<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    public function index(){
        $devise = Auth::user()->gestionnaire->etablissement->devise;
        Session::put('devise', $devise);
        return view('index');
    }

    public function recenteVente(){
        $date_30_jours = Carbon::now()->subDays(30);
        $commandes_recentes = Commande::select(DB::raw('DATE(updated_at) as date'), DB::raw('SUM(montant_total) as total'))
            ->where('updated_at', '>=', $date_30_jours)
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $formatted_data = $commandes_recentes->map(function ($commande) {
            return [
                'x' => Carbon::createFromFormat('Y-m-d', $commande->date)->format('Y-m-d'), // Convertir la chaîne de caractères en objet Carbon
                'y' => $commande->total
            ];
        });

        return response()->json($formatted_data);
    }

}
