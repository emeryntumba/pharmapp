<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\StockMovement;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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

        StockMovement::create(
            [
                'user_id' => Auth::user()->id,
                'produit_id' => $produit->id,
                'quantite' => $request->qte,
                'movement_type' => 'in',
                'motif' => 'approvisionnement'
            ]
        );
        session()->flash('maj', 'Modification apportée avec succès');
        return redirect()->route('produit');
    }

    public function create(){
        return view('pages.produit-create');
    }

    public function store(Request $request){

        $produit = Produit::create($request->all());

        StockMovement::create(
            [
                'user_id' => Auth::user()->id,
                'produit_id' => $produit->id,
                'quantite' => request('qte'),
                'movement_type' => 'in',
                'motif' => 'approvisionnement'
            ]
        );
        return redirect()
                ->route('produit')
                ->with('enregistrement', "Produit enregistré avec succès");
    }
}
