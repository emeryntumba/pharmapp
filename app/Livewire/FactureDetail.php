<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Commande;
use Livewire\Attributes\On;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class FactureDetail extends Component
{
    public $facture;
    public $ligneCommandes;

    public function mount(){
        $this->facture = Commande::latest()->first();
        $this->ligneCommandes = $this->facture->ligneCommandes;
    }

    public function render()
    {
        return view('livewire.facture-detail');
    }

    #[On('item-clicked')]
    public function onListen($data){
        $this->facture = Commande::findOrFail($data);
        $this->ligneCommandes = $this->facture->ligneCommandes;
    }

    public function print(){
        $pdf = Pdf::loadView('docs.invoice', [
            'products'=>$this->ligneCommandes,
            'totalGeneral'=>$this->facture->montant_total,
            'commande'=>$this->facture,
            'etablissement'=> Auth::user()->gestionnaire->etablissement,
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
            }, 'invoice.pdf');


    }


}
