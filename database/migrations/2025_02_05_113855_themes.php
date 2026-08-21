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
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->string('identifier')->nullable();
            $table->string('title')->nullable();
            $table->integer('status')->nullable();
            $table->text('general')->nullable();
            $table->text('theme_button')->nullable();
            $table->text('topbar')->nullable();
            $table->text('header')->nullable();
            $table->text('page_title')->nullable();
            $table->text('primary_button')->nullable();
            $table->text('secondary_button')->nullable();
            $table->text('body')->nullable();
            $table->text('filter')->nullable();
            $table->longText('html')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('themes');
    }
};



