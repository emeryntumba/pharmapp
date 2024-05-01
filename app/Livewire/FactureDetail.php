<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Commande;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Native\Laravel\Facades\System;

class FactureDetail extends Component
{
    public $facture;
    public $ligneCommandes;

    public function mount(){
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $this->facture = Commande::where('etablissement_id', $etablissement)->latest()->first();
        if($this->facture !== null){
            $this->ligneCommandes = $this->facture->ligneCommandes;
        }
    }


    public function render()
    {
        return view('livewire.facture-detail');
    }

    #[On('item-clicked')]
    public function onListen($data){
        $this->facture = Commande::findOrFail($data);
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        if($this->facture->etablissement_id == $etablissement){
            $this->ligneCommandes = $this->facture->ligneCommandes;
        }

    }

    public function print(){
        if ($this->ligneCommandes !== null){
            $file = View::make('docs.invoice', [
                'products' => $this->ligneCommandes,
                'totalGeneral' => $this->facture->montant_total,
                'commande' => $this->facture,
                'etablissement' => Auth::user()->gestionnaire->etablissement,
            ])->render();

            return System::print($file);
        }
    }


}
