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
        Schema::create('shipping_zone_regions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shipping_zone_id');
            $table->foreignId('country_id');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_zone_regions');
    }
};
