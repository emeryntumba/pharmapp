<?php

namespace App\Actions\Fortify;

use App\Models\Etablissement;
use App\Models\Gestionnaire;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Spatie\Permission\Models\Role;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
        ])->validate();

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        $etablissement = Etablissement::create([
            'nom_etablissement' => session('nom_etablissement'),
            'rccm' => session('rccm'),
            'id_nat' => session('id_nat'),
            'num_impot' => session('num_impot'),
            'tva' => session('tva'),
            'devise' => session('devise'),
            'adresse' => session('adresse')
        ]);

        Gestionnaire::create([
            'etablissement_id' => $etablissement->id,
            'user_id' => $user->id,
            'nom' => $input['name'],
            'telephone' => $input['telephone'],
        ]);

        $adminRole = Role::where('name', 'administrateur')->first();
        $user->assignRole($adminRole);

        Session::flush();

        return $user;
    }
}
