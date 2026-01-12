<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type'); // sepuede usar un enum pero como no sabemos si aumentarán los tipos mejor que sea un texto
            $table->string('photo')->nullable(); //gurada la ruta de la imagen
            $table->float('price');
            $table->longText('description');
            $table->foreignId('category_id')->constrained('category')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
