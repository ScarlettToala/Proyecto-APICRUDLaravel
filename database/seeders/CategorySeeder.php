<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    //Función enlazada para crear valores en la tabla
    public function run(): void
    {
        $categories = ['Mexicana', 'Italiana', 'China', 'Japonesa', 'Peruana', 'Americana'];

        foreach ($categories as $category) {
            Category::create(['type' => $category]);
        }
    }
}
