<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Allergen;

class AllergenSeeder extends Seeder
{
    public function run(): void
    {
        // Array con alérgenos y su foto correspondiente
        $alergenos = [
            ['type' => 'Gluten', 'photo' => 'GLUTEN.png'],
            ['type' => 'Lácteos', 'photo' => 'LACTEOS.png'],
            ['type' => 'Soja', 'photo' => 'SOJA.png'],
        ];

        foreach ($alergenos as $al) {
            Allergen::create($al);
        }
    }
}
