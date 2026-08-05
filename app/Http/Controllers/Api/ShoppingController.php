<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shopping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{

public function index()
    {
        $userId = Auth::id();
        $shopping = Shopping::with('product')->where('user_id', $userId)->get();

        $subtotal = $shopping->reduce(function ($carry, $item) {
            return $carry + ($item->product ? $item->product->price * $item->quantity : 0);
        }, 0);

        $gastosEnvio = 5;
        $total = $subtotal + $gastosEnvio;

        //Devuelve toda la cesta del usuario autenticado en formato JSON
       return response()->json([
        'items' => $shopping,
        'subtotal' => $subtotal,
        'shipping' => $gastosEnvio,
        'total' => $total
    ], 201);
    }

   public function store(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:product,id',
        'quantity' => 'required|integer|min:1'
    ]);

    $userId = Auth::id();

    $cartItem = Shopping::where('user_id', $userId)
        ->where('product_id', $request->product_id)
        ->first();

    if ($cartItem) {
        $cartItem->quantity += $request->quantity;
        $cartItem->save();
    } else {
        $cartItem = Shopping::create([
            'user_id' => $userId,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
        ]);
    }

    return response()->json([
        'message' => 'Producto añadido a la shopping',
        'data' => $cartItem
    ], 201);
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shopping $shopping)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        //dd($cesta, $request->quantity); // <--- verifica aquí

        $shopping->update([
            'quantity' => $request->quantity,
        ]);

       return response()->json([
        'message' => 'Cesta actualizada correctamente',
        'data' => $shopping
    ], 200);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shopping $shopping)
    {
        $shopping->delete();

        return response()->json([
            'message' => 'Producto eliminado de la cesta'
        ], 200);
    }

}