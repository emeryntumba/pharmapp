<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Produit;
use Livewire\Attributes\On;

class FactureComponent extends Component
{
    public $products = [];

    public $totalGeneral;

    public function render(){
        return view('livewire.facture-component');
    }

    #[On('product-added')]
    public function listen($data){

        $existingProduct = collect($this->products)->firstWhere('id', $data);

        if ($existingProduct) {
            $existingProduct['qte'] += 1;
        } else {

            $product = Produit::find($data);
            if ($product){
                $this->products[] = [
                    'id' => $product->id,
                    'nom' => $product->nom,
                    'dosage' => $product->dosage,
                    'forme' => $product->forme_galenique,
                    'prixU' => $product->prix,
                    'qte' => 1,
                ];
            }
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
