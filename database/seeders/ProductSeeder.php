<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Allergen;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Obtenemos IDs de categorías y alérgenos
        $categorias = Category::all()->pluck('id', 'type'); // ['Italiana' => 1, ...]
        $alergenos = Allergen::all(); // Colección de todos los alérgenos

        $productos = [
            [
                'name' => 'sopa de batata y frijol',
                'type' => 'normal',
                'photo' => 'sopa_batata_frijol.png',
                'price' => 22.99,
                'description' => 'sopa de batata y frijol.',
                'category_id' => $categorias['Italiana'],
            ],
            [
                'name' => 'shakshuka',
                'type' => 'normal',
                'photo' => 'shakshuka.png',
                'price' => 17.99,
                'description' => 'plato típico de la cocina mexicana.',
                'category_id' => $categorias['Mexicana'],
            ],
            [
                'name' => 'ensalada Cítrica',
                'type' => 'normal',
                'photo' => 'ensalada_citrica.png',
                'price' => 12.99,
                'description' => 'ensalada fresca con frutas y vinagreta.',
                'category_id' => $categorias['Japonesa'],
            ],
            [
                'name' => 'fideo con verduras',
                'type' => 'normal',
                'photo' => 'fideos_con_verduras.png',
                'price' => 20.99,
                'description' => 'fideos salteados con verduras frescas.',
                'category_id' => $categorias['Americana'],
            ],
            [
                'name' => 'poke de verduras y pollo',
                'type' => 'normal',
                'photo' => 'poke_verduras_pollo.png',
                'price' => 17.99,
                'description' => 'poke hawaiano con verduras y pollo.',
                'category_id' => $categorias['Italiana'],
            ],
            [
                'name' => 'mapo baked beans',
                'type' => 'normal',
                'photo' => 'mapo_baked_beans.png',
                'price' => 17.99,
                'description' => 'platillo fusión con frijoles horneados al estilo asiático.',
                'category_id' => $categorias['China'],
            ],
            [
                'name' => 'tacos de carne picada',
                'type' => 'delivery',
                'photo' => 'tacos.png',
                'price' => 22.99,
                'description' => 'ceviche peruano fresco con limón y cilantro.',
                'category_id' => $categorias['Mexicana'],
            ],
            [
                'name' => 'pizza mediterránea',
                'type' => 'delivery',
                'photo' => 'pizza.png',
                'price' => 17.99,
                'description' => 'ceviche peruano fresco con limón y cilantro.',
                'category_id' => $categorias['Italiana'],
            ],
            [
                'name' => 'tallarines con verduras',
                'type' => 'delivery',
                'photo' => 'tallarines.png',
                'price' => 12.99,
                'description' => 'ceviche peruano fresco con limón y cilantro.',
                'category_id' => $categorias['Peruana'],
            ],
            [
                'name' => 'tagliatelle a la carbonara',
                'type' => 'delivery',
                'photo' => 'tagliatelle.png',
                'price' => 20.99,
                'description' => 'ceviche peruano fresco con limón y cilantro.',
                'category_id' => $categorias['Peruana'],
            ],
        ];

        // Creamos los productos y asociamos alérgenos de forma aleatoria 
        foreach ($productos as $prod) {
            $producto = Product::create($prod);

            // Elegimos de forma aleatoria 0, 1 o varios alérgenos
            if ($alergenos->count() > 0) {
                $aleatorios = $alergenos->random(rand(1, $alergenos->count()));

                // Si es un solo modelo, lo convertimos a array
                if ($aleatorios instanceof \App\Models\Allergen) {
                    $aleatorios = collect([$aleatorios]);
                }

                $producto->allergens()->attach($aleatorios->pluck('id')->toArray());
            }
        }
    }
}
