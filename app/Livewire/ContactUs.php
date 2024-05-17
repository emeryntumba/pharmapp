<?php

namespace App\Livewire;

use App\Models\ContactUs as ModelsContactUs;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ContactUs extends Component
{
    public $name;
    public $email;
    public $subject;
    public $message;

    public function render()
    {
        return view('livewire.contact-us');
    }

    public function submit(){
        ModelsContactUs::create([
            'name' => $this->name,
            'email' => $this->email,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        Session::flash('message', 'Message envoyé avec succès, nous vous repondrons très bientot');
    }
}
