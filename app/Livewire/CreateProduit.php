<?php

namespace App\Livewire;

use Livewire\Component;


class CreateProduit extends Component
{
    public $modalVisible = false;

    public function render()
    {
        return view('livewire.create-produit');
    }

    public function ouvrirModal(){
        $this->modalVisible = true;
    }

    public function fermerModal(){
        $this->modalVisible = false;
    }
}
