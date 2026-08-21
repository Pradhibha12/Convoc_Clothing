<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public $withinTransaction = false;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->text('keywords')->nullable();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->string('product_id')->nullable();
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->integer('store_id')->nullable();
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->string('admin_revenue')->nullable();
            $table->string('vendor_revenue')->nullable();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->integer('discount_value')->nullable();
        });

        Schema::table('shipping_rules', function (Blueprint $table) {
            $table->string('shipping_method')->nullable();
        });

        Schema::table('stores', function (Blueprint $table) {
            $table->string('admin_revenue')->nullable();
            $table->string('vendor_revenue')->nullable();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('is_vendor')->nullable();
            $table->longText('paymentkeys')->nullable();
            $table->longText('temp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};



