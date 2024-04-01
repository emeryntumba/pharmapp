<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produit;
use Livewire\Attributes\On;


class ProduitComponent extends Component
{

    public $search = '';
    public $afficher;
    public $produits;

    public function mount(){

        $this->afficher = 10;
        $this->produits = Produit::query()
            ->where('nom', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->take($this->afficher)
            ->get();
    }

    public function render()
    {
        if ($this->afficher == "all"){
            $this->produits = Produit::orderBy('created_at', 'desc')
            ->where('nom', 'like', '%' . $this->search . '%')
            ->get();

        }else{
            $this->produits = Produit::query()
            ->where('nom', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->take($this->afficher)
            ->get();
        }


        return view('livewire.produit-component');
    }

    public function delete($id){
        $produit = Produit::find($id);

        if($produit){
            $produit->stockMovements()->delete();
            $produit->delete();
        }
    }

    #[On('products-refreshed')]
    public function refreshList(){
        $this->produits = Produit::all();
    }

    public function showDetails($id){
        $this->dispatch('showed', data:$id);
    }

    public function showTransactions($id){
        $this->dispatch('transac', data:$id);
    }



}
