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
        // Shipping Zones Migration
        Schema::create('shipping_rules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipping_zone_id');
            $table->double('min_weight')->nullable();
            $table->double('max_weight')->nullable();
            $table->double('min_price')->nullable();
            $table->double('max_price')->nullable();
            $table->string('cost_type')->nullable();
            $table->double('cost');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_rules');
    }
};
