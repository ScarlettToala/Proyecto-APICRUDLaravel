<?php

namespace App\Http\Controllers;

use App\Models\Shopping;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $cestas = Shopping::with('product')->where('user_id', $userId)->get();

        $subtotal = $cestas->reduce(function ($carry, $item) {
            return $carry + ($item->product ? $item->product->price * $item->quantity : 0);
        }, 0);

        $gastosEnvio = 5;
        $total = $subtotal + $gastosEnvio;

        return view('cesta.index', compact('cestas', 'subtotal', 'gastosEnvio', 'total'));
    }



    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:product,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $userId = Auth::id(); //-> verificación del usuario

        $cartItem = Shopping::where('user_id', $userId)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            Shopping::create([
                'user_id' => $userId,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()
            ->route('home')
            ->with('success', 'Producto añadido a la cesta correctamente ✅');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Shopping $cesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Shopping $cesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Shopping $cesta)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        //dd($cesta, $request->quantity); // <--- verifica aquí

        $cesta->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('cesta.index')->with('success', 'Cantidad actualizada');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Shopping $cesta)
    {
        $cesta->delete();

        return redirect()->route('cesta.index')->with('success', 'Producto eliminado');
    }
}
