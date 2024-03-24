<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\StockMovement;

class StockController extends Controller
{
    public function index(){

        $commandes = Commande::orderBy('created_at', 'desc')->get();
        $stock_out = StockMovement::where('movement_type', 'in')->orderBy('created_at', 'desc')->get();

        return view('pages.stock', compact('commandes', 'stock_out'));
    }

    public function show($id){

        $facture = Commande::findOrFail($id);
        $ligneCommandes = $facture->ligneCommandes;

        return view('pages.facture-show', compact('ligneCommandes', 'facture'));
    }
}
