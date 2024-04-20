<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;

class ProduitTable extends Component{
    public $search = '';
    public $sortField = 'id';
    public $sortDirection = 'asc';
    public $afficher = 10;
    public $produits;

    public function render()
    {
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        if ($this->afficher == "all"){
            $produits = $this->produits = Produit::where('etablissement_id', $etablissement)
            ->orderBy($this->sortField, $this->sortDirection)
            ->where('nom', 'like', '%' . $this->search . '%')
            ->get();

        }else{
            $produits = $this->produits = Produit::query()
            ->where('etablissement_id', $etablissement)
            ->where('nom', 'like', '%' . $this->search . '%')
            ->orderBy($this->sortField, $this->sortDirection)
            ->take($this->afficher)
            ->get();
        }
        return view('livewire.produit-table', [
            'produits' => $produits
        ]);
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
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $this->produits = Produit::where('etablissement_id', $etablissement);
    }
}
