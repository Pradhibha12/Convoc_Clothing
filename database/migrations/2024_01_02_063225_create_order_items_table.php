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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->text('item_attributes')->nullable(); // json
            $table->integer('quantity')->nullable();
            $table->double('price')->nullable();
            $table->double('discounted_amount')->nullable();
            $table->double('shipping_cost')->nullable();
            $table->double('vat')->nullable(); //amount
            $table->double('subtotal')->nullable(); //quantity * discount price + vat + shipping cost
            $table->timestamps();

            $table->index('product_id');
            $table->index('order_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
