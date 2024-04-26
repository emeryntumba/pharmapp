<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Commande;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class FactureList extends Component
{
    use WithPagination;

    public $search = '';
    public $afficher = 10;

    public function render()
    {
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $commandes = Commande::query()
            ->where('etablissement_id', $etablissement)
            ->where('id', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate($this->afficher);

        return view('livewire.facture-list', [
            'commandes' => $commandes
        ]);
    }

    public function onItemClicked($id){
        $this->dispatch('item-clicked', data: $id);
    }
}
