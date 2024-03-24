<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParametreController extends Controller
{
    public function index(){
        $etablissement = Auth::user()->gestionnaire->etablissement;
        return view('pages.parametre', compact('etablissement'));
    }

    public function update(Request $request){
        $etablissement = Auth::user()->gestionnaire->etablissement;
        $etablissement->update($request->all());
        return redirect()->back()->with('success-param', 'Mise à jour effectué avec succès');
    }
}
