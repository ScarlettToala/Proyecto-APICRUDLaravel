<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Devuelve todos los productos.
     */
    public function index()
    {
        return response()->json(
            Product::with('category', 'allergens')->get()
        );
    }

    /**
     * Devuelve un único producto.
     */
    public function show($id)
    {
        return response()->json(
            Product::with('category', 'allergens')->findOrFail($id)
        );
    }
    //busqueda de productos por nombre
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

        $productos = $query->get();

       //$alergenos = Allergen::all();
        //$categorias = Category::all();
    return response()->json($productos);
}
}