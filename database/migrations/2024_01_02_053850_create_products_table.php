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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('store_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->integer('status')->nullable();
            $table->string('title')->nullable();
            $table->string('code')->nullable();
            $table->string('slug')->nullable();
            $table->text('tags')->nullable();
            $table->string('label')->nullable(); //New, Trendy, Top, Popular, etc.
            $table->string('quality_label')->nullable(); //Authentic, Premium, Handmade, etc.
            $table->text('summary')->nullable();
            $table->longText('description')->nullable();
            $table->double('average_rating')->nullable();
            $table->double('price')->nullable();
            $table->string('vat_type')->nullable();
            $table->integer('vat_value')->nullable();
            $table->double('shipping_cost')->nullable();
            $table->string('unit')->nullable();
            $table->integer('total_stock')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('banner')->nullable();
            $table->timestamps();

            $table->index('category_id');
            $table->index('user_id');
            $table->index('store_id');
            $table->index('brand_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
