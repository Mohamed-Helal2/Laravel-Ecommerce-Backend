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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cart_id')->constrained('carts')->cascadeOnDelete(); // referencing the cart
            $table->foreignId('product_id')->constrained('products')->cascadeOnDelete(); // referencing the product
            $table->integer('quantity'); // Quantity of the product
            $table->decimal('price', 10, 2); // Price of the product at the time it was added to the cart
            $table->decimal('total', 10, 2); // total price for the quantity of this product
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
