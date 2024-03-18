<?php

namespace App\Livewire;

use App\Models\Produit;
use Livewire\Component;
use Livewire\Attributes\On;

class DetailVenteProduit extends Component
{

    public $produit;
    public $isOpen = false;

    public function render(){
        return view('livewire.detail-vente-produit');
    }

    #[On('transac')]
    public function listen($data){
        $this->produit = Produit::find($data);
        $this->isOpen = true;
    }

    public function close(){
        $this->isOpen = false;
    }

}
