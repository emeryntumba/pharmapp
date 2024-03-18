<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\StockMovement;
use Carbon\Carbon;


class ProduitController extends Controller
{
    public function index(){
        return view('pages.produit');
    }

    public function showTransactions($id){
        $produit = Produit::findOrFail($id);
        $currentMonth = Carbon::now()->month;

        $totalVendu = $produit->stockMovements()->where('movement_type', 'out')
                ->whereMonth('created_at', $currentMonth)
                ->sum('quantite');

        $totalEntree = $produit->stockMovements()->where('movement_type', 'in')
                ->whereMonth('created_at', $currentMonth)
                ->sum('quantite');
        return view('pages.produit-show', compact('produit', 'currentMonth', 'totalVendu', 'totalEntree'));
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
