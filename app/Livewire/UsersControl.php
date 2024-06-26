<?php

namespace App\Livewire;

use App\Mail\CoUserCreated;
use App\Models\Gestionnaire;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UsersControl extends Component
{
    public $name;
    public $email;
    public $role;

    public function render()
    {
        $etablissement = Auth::user()->gestionnaire->etablissement->id;
        $gestionnaires = Gestionnaire::where('etablissement_id', $etablissement)->get();
        $users = $gestionnaires->pluck('user');

        return view('livewire.users-control', [
            'users' => $users,
        ]);
    }

    public function createUser(){
        if(Auth::user()->hasRole('administrateur')){
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => bcrypt('pharmapp'.Carbon::now()->year),
            ]);
            $user->assignRole($this->role);

            Gestionnaire::create([
                'etablissement_id' => Auth::user()->gestionnaire->etablissement->id,
                'user_id' => $user->id,
                'nom' => $user->name,
            ]);

            $this->reset();

            $etablissement = Auth::user()->gestionnaire->etablissement;
            Mail::to($user->email)->send(new CoUserCreated($user, $etablissement));

            $msg = 'Utilisateur créé avec succès, une notification est envoyée à son adresse avec toutes les infos de connexion, merci !';
            Session::flash('message', $msg);
        }
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
    }
}
