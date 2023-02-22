<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'pseudo' => 'administrateur',
            'password' => Hash::make('Azerty88@'),
            'email' => 'admin@cedrick.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(),
            'role_id' => 2 

        ]);

        User::create([
            'pseudo' => 'utilisateur',
            'password' => Hash::make('Azerty88@'),
            'email' => 'utilisateur@cedrick.fr',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'role_id' => 1 

        ]);

        User::factory(8)->create();




    }   
}
