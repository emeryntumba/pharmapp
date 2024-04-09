<?php

namespace App\Livewire;

use App\Models\Portefeuille as ModelsPortefeuille;
use Livewire\Component;

class Portefeuille extends Component
{
    public $total_entree;
    public $total_sortie;

    public $type_transaction;
    public $raison;
    public $montant;

    public function render()
    {
        $this->total_entree = ModelsPortefeuille::where('type_transaction', 'entree_caisse')->sum('montant');
        $this->total_sortie = ModelsPortefeuille::where('type_transaction', 'sortie_caisse')->sum('montant');;

        return view('livewire.portefeuille');
    }

    public function save(){
        ModelsPortefeuille::create([
            'montant' => $this->montant,
            'type_transaction' => $this->type_transaction,
            'raison' => $this->raison,
        ]);

        $this->reset('montant', 'raison', 'type_transaction');
    }
}
