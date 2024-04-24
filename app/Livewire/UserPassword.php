<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class UserPassword extends Component
{
    public $currentPassword;
    public $password;
    public $passwordConfirmation;

    public function render()
    {
        return view('livewire.user-password');
    }

    public function changePassword(){
        $user = Auth::user();

        if (password_verify($this->currentPassword, $user->password)){
            if ($this->password == $this->passwordConfirmation){
                $user->update([
                    'password' => bcrypt($this->password)
                ]);
                Session::flash('message-succes', 'Mot de passe changé avec succès');
                $this->reset();
            } else {
                Session::flash('message-error', 'Les nouveaux mots de passe ne correspondent pas');
            }
        } else {
            Session::flash('message-error', 'Mot de passe actuel incorrect');
        }
    }
}
