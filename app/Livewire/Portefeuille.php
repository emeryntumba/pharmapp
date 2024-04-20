<?php

namespace App\Livewire;

use App\Models\Portefeuille as ModelsPortefeuille;
use Illuminate\Support\Facades\Auth;
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
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $this->total_entree = ModelsPortefeuille::where('etablissement_id', $etablissement)
        ->where('type_transaction', 'entree_caisse')->sum('montant');

        $this->total_sortie = ModelsPortefeuille::where('etablissement_id', $etablissement)
        ->where('type_transaction', 'sortie_caisse')->sum('montant');;

        return view('livewire.portefeuille');
    }

    public function save(){
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        ModelsPortefeuille::create([
            'montant' => $this->montant,
            'type_transaction' => $this->type_transaction,
            'raison' => $this->raison,
            'etablissement_id' => $etablissement
        ]);

        $this->reset('montant', 'raison', 'type_transaction');
    }
}
