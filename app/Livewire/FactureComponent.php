<?php

namespace App\Livewire;

use App\Models\Commande;
use App\Models\LigneCommande;
use App\Models\Portefeuille;
use Livewire\Component;
use App\Models\Produit;
use App\Models\StockMovement;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\View;
use Native\Laravel\Facades\System;

class FactureComponent extends Component
{
    public $products = [];


    public function render(){

        return view('livewire.facture-component',[
            'totalGeneral' => $this->calculerTotalGeneral(),
        ]);
    }

    #[On('product-added')]
    public function listen($data){

        // Recherche du produit dans la base de données ou autre source
        $produit = Produit::findOrFail($data);

        // Vérification si le produit existe déjà dans la facture
        $index = $this->indexOfProductInInvoice($data);

        if ($index !== false) {
            // Si le produit existe, incrémenter la quantité
            $this->products[$index]['quantite']++;
            $this->products[$index]['total'] = $this->products[$index]['quantite'] * $produit->prix;
        } else {
            // Sinon, ajouter le produit à la facture
            $this->products[] = [
                'produit' => $produit,
                'quantite' => 1,
                'total' => $produit->prix
            ];
        }


    }

    public function indexOfProductInInvoice($produitId)
    {
        foreach ($this->products as $index => $product) {
            if ($product['produit']->id === $produitId) {
                return $index;
            }
        }

        return false;
    }

    public function recalculerTotal($index)
    {
        // Récupérer la quantité entrée par l'utilisateur
        $quantite = $this->products[$index]['quantite'];

        // Vérifier si la quantité est un nombre valide
        if (is_numeric($quantite)) {
            // Si oui, mettre à jour le total
            $this->products[$index]['total'] = $quantite * $this->products[$index]['produit']->prix;
            $this->calculerTotalGeneral();
        }
    }
    public function calculerTotalGeneral()
    {
        $totalGeneral = 0;

        // Calculer la somme des totaux individuels de chaque produit
        foreach ($this->products as $product) {
            $totalGeneral += $product['total'];
        }

        return $totalGeneral;
    }

    public function resetInvoice(){
        $this->products = [];
    }

    public function save(){
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $montant_total = 0;

        $cmd =  Commande::create([
            'client_id' => 1,
            'mode_paiement' => 'cash',
            'etablissement_id' => $etablissement,
            'gestionnaire_id' => Auth::user()->gestionnaire->id,
        ]);

        foreach ($this->products as $product) {

            $montant_total += $product['total'];

            LigneCommande::create([
                'commande_id' => $cmd->id,
                'produit_id' => $product['produit']->id,
                'prix' => $product['produit']->prix,
                'quantite' => $product['quantite'],
                'total' => $product['total'],
            ]);

            StockMovement::create(
                [
                    'user_id' => Auth::user()->id,
                    'produit_id' => $product['produit']->id,
                    'quantite' => $product['quantite'],
                    'movement_type' => 'out',
                    'motif' => 'vente',
                    'etablissement_id' => $etablissement,
                ]
            );
        }

        $cmd->update([
            'montant_total' => $montant_total,
        ]);

        Portefeuille::create([
            'montant' => $montant_total,
            'type_transaction' => 'entree_caisse',
            'raison' => 'Vente, reference facture:'.$cmd->id,
            'etablissement_id' => $etablissement,
        ]);


        $file = View::make('docs.invoice', [
            'products' => $this->ligneCommandes,
            'totalGeneral' => $this->facture->montant_total,
            'commande' => $this->facture,
            'etablissement' => Auth::user()->gestionnaire->etablissement,
        ])->render();



        $this->dispatch('stock-refreshed');

        $this->products = [];
        $montant_total = 0;

        return System::print($file);
    }


    public function delete($index){
        unset($this->products[$index]);
        $this->products = array_values($this->products);
    }


}
