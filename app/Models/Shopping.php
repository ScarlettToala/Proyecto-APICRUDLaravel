<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    protected $table = 'Shopping'; // tabla 

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
    ];

    // Relación con producto
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Relación con usuarios
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Atributo calculado: total del producto en la cesta
    public function getTotalAttribute()
    {
        if ($this->product) {
            return $this->product->price * $this->quantity;
        }
        return 0;
    }

    
}
