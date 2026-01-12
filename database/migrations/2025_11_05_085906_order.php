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
    { //Es cuando el suario ya pago y quiere recibir el pedido
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->date('pickup_day');
            $table->time('pickup_time');
            $table->string('address');
            $table->enum('payment_type',['card', 'cash'])->default('card');
            $table->foreignId('user_id')->constrained('user'); //para identificar quien lo ha pedido
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
