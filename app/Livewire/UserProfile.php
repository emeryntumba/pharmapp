<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class UserProfile extends Component
{
    public $name;
    public $email;

    public function mount(){
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;
    }
    public function render()
    {

        return view('livewire.user-profile');
    }

    public function sauvegarder(){
        $user = Auth::user();
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        Session::flash('message', 'Les modifications ont été enregistrées avec succès.');
    }
}
