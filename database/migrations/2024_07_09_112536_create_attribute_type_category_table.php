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
        Schema::create('attribute_type_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('attribute_type_id');
            $table->unsignedInteger('category_id');
            $table->timestamps();

            $table->index('attribute_type_id');
            $table->index('category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_type_category');
    }
};
