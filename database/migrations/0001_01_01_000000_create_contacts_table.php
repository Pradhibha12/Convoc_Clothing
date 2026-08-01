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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // User's name (optional)
            $table->string('email')->nullable(); // User's email (optional)
            $table->string('phone')->nullable(); // User's phone number (optional)
            $table->text('message'); // User's message
            $table->integer('is_read')->default(0); // IP address of the user
            $table->ipAddress('ip_address')->nullable(); // IP address of the user
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
