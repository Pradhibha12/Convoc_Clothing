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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable(); //if applicable for a specific user
            $table->string('code');
            $table->string('title')->nullable();
            $table->string('discount_type');
            $table->integer('discount_value');
            $table->double('minimum_order_amount')->nullable();
            $table->double('maximum_discount_amount')->nullable();
            $table->integer('usage_limit')->nullable();
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->longText('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
