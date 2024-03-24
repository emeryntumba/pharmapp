<?php

namespace App\Livewire;

use App\Models\Commande;
use App\Models\LigneCommande;
use Livewire\Component;
use App\Models\Produit;
use App\Models\StockMovement;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Barryvdh\DomPDF\Facade\Pdf;

class FactureComponent extends Component
{
    public $products = [];


    public function render(){

        return view('livewire.facture-component');
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
        }
    }

    public function resetInvoice(){
        $this->products = [];
    }

    public function save(){
        $montant_total = 0;

        $cmd =  Commande::create([
            'client_id' => 1,
            'mode_paiement' => 'cash',
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
                ]
            );
        }

        $cmd->update([
            'montant_total' => $montant_total,
        ]);


        $pdf = Pdf::loadView('docs.invoice', [
            'products'=>$this->products,
            'totalGeneral'=>$montant_total,
            'commande'=>$cmd,
            'etablissement'=> Auth::user()->gestionnaire->etablissement,
        ]);

        $this->dispatch('stock-refreshed');

        $this->products = [];
        $montant_total = 0;

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
            }, 'invoice.pdf');


    }


    public function delete($index){
        unset($this->products[$index]);
        $this->products = array_values($this->products);
    }


}
