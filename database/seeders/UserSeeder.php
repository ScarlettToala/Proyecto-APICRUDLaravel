<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $user = new User();
            $user->name = 'Apple';
            $user->email = 'apple@abalit.org';
            $user->password = bcrypt('1234'); // <--- aquí se hashea la contraseña
            $user->role = 'admin';
        $user->save();
        
            User::factory(10)->create();
    }
}
