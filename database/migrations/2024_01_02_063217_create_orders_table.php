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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('coupon_id')->nullable();
            $table->double('total_price')->nullable();
            $table->double('total_discounted_amount')->nullable();
            $table->double('total_order_amount')->nullable();
            $table->double('total_shipping_cost')->nullable();
            $table->double('total_amount_of_vat')->nullable();
            $table->double('grand_total')->nullable(); //discount price + vat + shipping cost
            $table->double('coupon_discount_amount')->nullable();
            $table->double('payable_amount')->nullable();
            $table->string('currency_code')->nullable(); // usd
            $table->unsignedBigInteger('billing_address_id')->nullable();
            $table->unsignedBigInteger('shipping_address_id')->nullable();
            $table->string('payment_method')->nullable(); //(e.g., credit card, PayPal, cash on delivery).
            $table->timestamps();

            $table->index('user_id');
            $table->index('coupon_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
