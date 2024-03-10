<?php

namespace App\Livewire;

use App\Models\Produit;
use App\Models\StockMovement;
use GuzzleHttp\Promise\Create;
use Livewire\Component;
use Livewire\Attributes\Validate;

class FormulaireProduit extends Component
{
    #[Validate('required')]
    public $nom;

    #[Validate('required')]
    public $forme_galenique;

    #[Validate('required')]
    public $dosage;

    #[Validate('required')]
    public $qte;

    #[Validate('required')]
    public $prix;

    public $description;
    public $fabricant;
    public $code_CIP;

    #[Validate('required')]
    public $date_peremption;

    public function mount(){
        $this->forme_galenique = "comprimé";
    }

    public function render()
    {
        return view('livewire.formulaire-produit');
    }

    public function save(){

        try {
            $this->validate();

            $produit = Produit::Create(
                $this->only([
                    'nom',
                    'forme_galenique',
                    'dosage',
                    'prix',
                    'description',
                    'fabricant',
                    'code_CIP',
                    'date_peremption',
                ])
            );


            StockMovement::create(
                [
                    'produit_id' => $produit->id,
                    'quantite' => $this->qte,
                    'movement_type' => 'in',
                ]
            );

            $this->dispatch('closeModal');

            session()->flash('status', "Produit enregistré avec succès");

            $this->redirect('/produit');

        } catch (\Exception $e) {

            dd($e->getMessage());
        }
    }
}
