<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\StockMovement;

class ProduitController extends Controller
{
    public function index(){
        return view('pages.produit');
    }

    public function showTransactions($id){
        $produit = Produit::findOrFail($id);
        return view('pages.produit-show', compact('produit'));
    }

    public function edit($id){
        $produit = Produit::findOrFail($id);
        return view('pages.produit-edit', compact('produit'));
    }

    public function update(Request $request, $id){
        $produit = Produit::findOrFail($id);
        $produit->update($request->all());
        $type='in';
        StockMovement::create(
            [
                'produit_id' => $produit->id,
                'quantite' => 2,
                'movement_type' => $type,
            ]
        );
        session()->flash('maj', 'Modification apportée avec succès');
        return redirect()->route('produit');
    }
}
