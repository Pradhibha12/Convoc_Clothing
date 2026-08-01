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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('review_id')->nullable();
            $table->string('path')->nullable();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('extension')->nullable();
            $table->string('size')->nullable();
            $table->timestamps();

            $table->index('product_id')->nullable();
            $table->index('review_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
