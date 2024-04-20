<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;

class FactureList extends Component
{
    public $commandes;
    public $search = '';
    public $afficher = 10;

    public function render()
    {
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        if($this->afficher == "all"){
            $this->commandes = Commande::where('etablissement_id', $etablissement)->orderBy('created_at', 'desc')->get();
        }else{
            $this->commandes = Commande::query()
            ->where('etablissement_id', $etablissement)
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
