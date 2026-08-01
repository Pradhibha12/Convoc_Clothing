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
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('address')->nullable();
            $table->integer('is_primary')->nullable();
            $table->timestamps();

            $table->index('country_id')->nullable();
            $table->index('state_id')->nullable();
            $table->index('city_id')->nullable();
            $table->index('user_id')->nullable();
            $table->index('is_primary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_addresses');
    }
};
