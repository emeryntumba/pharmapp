<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Produit;

class TestComponent extends Component
{



    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $afficher = 10;
    public $produits;

    public function render()
    {
        if ($this->afficher == "all"){
            $produits = $this->produits = Produit::orderBy($this->sortField, $this->sortDirection)
            ->where('nom', 'like', '%' . $this->search . '%')
            ->get();

        }else{
            $produits = $this->produits = Produit::query()
            ->where('nom', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->take($this->afficher)
            ->get();
        }
        return view('livewire.test-component', compact('produits'));
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

    public function addToInvoice($productId)
    {
        $this->dispatch('product-added', data: $productId);
    }

    #[On('stock-refreshed')]
    public function refreshStock(){
        $this->produits = Produit::all();
    }
}
