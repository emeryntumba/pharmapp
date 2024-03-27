<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\StockMovement;

class StockController extends Controller
{
    public function index(){
        return view('pages.stock');
    }

    public function show($id){

       

        return view('pages.facture-show', compact('ligneCommandes', 'facture'));
    }
}
