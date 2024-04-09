<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Commande;
use App\Models\StockMovement;

class FactureList extends Component
{
    public $commandes;
    //public $stock_out;

    public $search = '';
    public $afficher = 10;

    public function render()
    {
        if($this->afficher == "all"){
            $this->commandes = Commande::orderBy('created_at', 'desc')->get();
            //$this->stock_out = StockMovement::where('movement_type', 'in')->orderBy('created_at', 'desc')->get();
        }else{
            $this->commandes = Commande::query()
            ->where('id', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->take($this->afficher)
            ->get();
        }

        return view('livewire.facture-list');
    }

    public function onItemClicked($id){
        $this->dispatch('item-clicked', data: $id);
    }
}
