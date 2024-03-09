<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produit;
use Livewire\Attributes\On;

class FactureComponent extends Component
{
    public $products = [];
    public $qte;
    public $totalGeneral;

    public function mount(){
        $this->qte = 1;
    }

    public function render(){
        return view('livewire.facture-component');
    }

    #[On('product-added')]
    public function listen($data){

        $existingProduct = collect($this->products)->firstWhere('id', $data);

        if ($existingProduct) {
            $this->qte += 1;
        } else {

            $this->products[] = Produit::find($data);
        }
    }


    public function delete($id){
        $index = array_search(intval($id), $this->products);

        if ($index !== false) {
            // Supprimer l'élément trouvé
            unset($this->products[$index]);
        }
    }


}
