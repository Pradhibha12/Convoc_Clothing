<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public bool $withinTransaction = false;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('store_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('store_id')->nullable();
            $table->string('currency')->nullable();
            $table->string('vat_type')->nullable();
            $table->integer('vat_value')->nullable();
            $table->decimal('shipping_cost', 8, 2)->default(0.00);
            $table->string('timezone', 100)->nullable();
            $table->string('store_email')->nullable();
            $table->string('support_phone')->nullable();
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('store_settings');
    }
};

