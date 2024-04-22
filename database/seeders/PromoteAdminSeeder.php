<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PromoteAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::findOrFail(4);
        if($user){
            $adminRole = Role::where('name', 'administrateur')->first();
            $user->assignRole($adminRole);
            $this->command->info('l\'utilisateur a été promu administrateur');
        }else{
            $this->command->error('Aucun utilisateur trouvé avec cet ID');
        }
    }
}
