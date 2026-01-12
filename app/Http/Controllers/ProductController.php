<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Allergen;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cargar todos los productos con todas las relaciones
    $products = Product::with('category', 'allergens')->get();

    return view('index', compact('products'));
    }

        /**
     * Display a listing of the resource.
     */
    public function all()
    {
        // Cargar todos los productos con todas las relaciones
    $products = Product::with('category', 'allergens')->get();

    return view('product.products-all', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        /*=== Mostrar el detalle del producto ===*/
            $product = Product::findOrFail($id);

            $imageFiles = File::files(public_path('img/random-products'));

            $randomImages = collect($imageFiles)
                ->shuffle()
                ->take(3)
                ->map(fn($file) => 'img/random-products/' . $file->getFilename())
                ->toArray();

            // Agregamos la imagen principal del producto al array para que sean 4 imágenes
            $allImages = array_merge(['img/products/' . $product->photo], $randomImages);

            return view('show', compact('product', 'allImages'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function search(Request $request)
    {
        $query = Product::with('category', 'allergens');

        // --- FILTRO POR TEXTO ---
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }


        // --- FILTRO POR CATEGORÍAS ---
        if ($request->filled('categorias')) {
            $query->whereIn('category_id', $request->categorias);
        }

        // --- FILTRO POR ALÉRGENOS ---
        if ($request->filled('alergenos')) {
            $query->whereDoesntHave('allergens', function ($q) use ($request) {
                $q->whereIn('allergen_id', $request->alergenos);
            });
        }

        $productos = $query->get();

        $alergenos = Allergen::all();
        $categorias = Category::all();

        return view('search', compact('productos', 'alergenos', 'categorias'));
    }
}
