<?php

namespace App\Http\Controllers;

use App\Models\Etablissement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EtablissementController extends Controller
{
    public function create(){
        return view('pages.etablissement-create');
    }

    public function store(Request $request){

        $etablissement = Etablissement::create([
            'nom_etablissement' => $request->nom_etablissement,
            'rccm' => $request->rccm,
            'id_nat' => $request->id_nat,
            'num_impot' => $request->num_impot,
            'tva' => $request->tva,
            'devise' => $request->devise,
            'adresse' => $request->adresse,
        ]);

        Session::put('id_etablissement', $etablissement->id);

        return redirect('/register');
    }
}
