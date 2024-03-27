<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Commande;
use App\Models\StockMovement;

class FactureList extends Component
{
    public $commandes;
    public $stock_out;

    public function render()
    {
        $this->commandes = Commande::orderBy('created_at', 'desc')->get();
        $this->stock_out = StockMovement::where('movement_type', 'in')->orderBy('created_at', 'desc')->get();
        return view('livewire.facture-list');
    }

    public function onItemClicked($id){
        $this->dispatch('item-clicked', data: $id);
    }
}
