<?php

namespace App\Livewire;

use App\Models\Gestionnaire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UsersControl extends Component
{
    public function render()
    {
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $gestionnaires = Gestionnaire::where('etablissement_id', $etablissement)->get();
        $users = $gestionnaires->pluck('user');
        
        return view('livewire.users-control', [
            'users' => $users,
        ]);
    }
}
