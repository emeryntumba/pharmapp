<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produit;
use Livewire\Attributes\On;

class ProduitEdit extends Component
{
    public $produit;

    public function render()
    {
        return view('livewire.produit-edit');
    }

    #[On('showed')]
    public function listen($data){
        $this->produit = Produit::findOrFail($data);
    }
}
