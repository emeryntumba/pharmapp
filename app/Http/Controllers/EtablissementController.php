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

        Session::put('nom_etablissement', $request->nom_etablissement);
        Session::put('rccm', $request->rccm);
        Session::put('id_nat', $request->id_nat);
        Session::put('num_impot', $request->num_impot);
        Session::put('tva', $request->tva);
        Session::put('devise', $request->devise);
        Session::put('adresse', $request->adresse);

        return redirect('/register');
    }
}
