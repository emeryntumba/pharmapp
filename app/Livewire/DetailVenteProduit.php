<?php

namespace App\Livewire;

use App\Models\Produit;
use Livewire\Component;



class DetailVenteProduit extends Component
{

    public $produit;
    public $afficher = 10;

    public function render(){

        if($this->afficher = "all"){
            $stockMovements = $this->produit
                            ->stockMovements()
                            ->orderBy('created_at', 'desc')
                            ->get();

        }else{
            $stockMovements = $this->produit
                            ->stockMovements()
                            ->orderBy('created_at', 'desc')
                            ->take($this->afficher)
                            ->get();
        }

        return view('livewire.detail-vente-produit', compact('stockMovements'));
    }

}
