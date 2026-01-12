<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    protected $fillable = [
        'name',
        'type',
        'photo',
        'price',
        'description',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class); // ¡singular! un producto pertenece a una categoría
    }

    public function allergens()
    {
        return $this->belongsToMany(Allergen::class, 'product_allergen');
    }

    // Un producto puede estar en muchas cestas
    public function carts()
    {
        return $this->hasMany(Shopping::class);
    }

    /*Accesor y mutador de eloquent*/
    /*Devolver instancia de product en minusulas y la primera en mayusculas. En la base de datos igual será en minisculas*/
        protected function name():Attribute
    {
        return Attribute::make(
            set: function($value){
                return strtolower($value);
            },
            get: function($value){
                return ucfirst($value);
            }
        );
    }
}