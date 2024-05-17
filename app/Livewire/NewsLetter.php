<?php

namespace App\Livewire;

use App\Models\NewsLetter as ModelsNewsLetter;
use Livewire\Component;
use Illuminate\Support\Facades\Validator;

class NewsLetter extends Component
{
    public $email;
    public $confirmationMessage;

    public function render()
    {
        return view('livewire.news-letter');
    }

    public function submit(){
        // Validation de l'e-mail
        $validator = Validator::make(
            ['email' => $this->email],
            ['email' => 'required|email']
        );

        // Vérification de la validation
        if ($validator->fails()) {
            $this->confirmationMessage = "Veuillez saisir une adresse e-mail valide.";
            return;
        }

        // Vérification si l'e-mail existe déjà dans la base de données
        $existingEmail = ModelsNewsLetter::where('email', $this->email)->first();

        if ($existingEmail) {
            $this->confirmationMessage = "Vous êtes déjà enregistré.";
        } else {
            // Enregistrement de l'e-mail dans la base de données
            ModelsNewsLetter::create([
                'email' => $this->email,
            ]);
            $this->confirmationMessage = "Vous êtes inscrit avec succès à notre newsletter.";
        }
    }
}
