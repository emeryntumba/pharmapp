<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produit;


class ProduitComponent extends Component
{


    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $afficher = 10;

    public function render()
    {
        if ($this->afficher == "all"){
            $produits = Produit::orderBy($this->sortField, $this->sortDirection)
            ->where('nom', 'like', '%' . $this->search . '%')
            ->get();

        }else{
            $produits = Produit::query()
            ->where('nom', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->take($this->afficher)
            ->get();
        }


        return view('livewire.produit-component', compact('produits'));
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function delete($id){
        $produit = Produit::find($id);

        if($produit){
            $produit->stockMovements()->delete();
            $produit->delete();
        }
    }

    public function showDetails($id){
        $this->dispatch('showed', data:$id);
    }

    public function showTransactions($id){
        $this->dispatch('transac', data:$id);
    }



}
