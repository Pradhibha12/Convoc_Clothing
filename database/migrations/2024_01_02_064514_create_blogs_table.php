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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('blog_category_id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('summary');
            $table->integer('status');
            $table->longText('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('banner')->nullable();
            $table->timestamps();

            $table->index('user_id');
            $table->index('blog_category_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
