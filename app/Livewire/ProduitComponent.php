<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\WithPagination;


class ProduitComponent extends Component{

    use WithPagination;

    public $search = '';
    public $afficher = 10;
    public $selectedElements = [];

    public function render(){
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $produits = Produit::query()
            ->where('etablissement_id', $etablissement)
            ->where('nom', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->afficher);


        return view('livewire.produit-component', [
            'produits' => $produits
        ]);
    }

    public function delete($id){
        $produit = Produit::find($id);

        if($produit){
            $produit->stockMovements()->delete();
            $produit->delete();
        }
    }

    /*#[On('products-refreshed')]
    public function refreshList(){
        $this->produits = Produit::all();
    }*/

    public function deleteSelected()
    {
        if (!empty($this->selectedElements)) {
            Produit::whereIn('id', $this->selectedElements)->delete();
            $this->selectedElements = [];
        }
    }

    public function showDetails($id){
        $this->dispatch('showed', data:$id);
    }

    public function showTransactions($id){
        $this->dispatch('transac', data:$id);
    }



}
