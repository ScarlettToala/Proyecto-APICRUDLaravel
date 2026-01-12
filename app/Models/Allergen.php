<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{   
    /*Nombre de la tabla de acceso*/ 
    protected $table = 'allergen';
    protected $fillable = [
        'type',
        'photo'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_allergen');
    }
}
