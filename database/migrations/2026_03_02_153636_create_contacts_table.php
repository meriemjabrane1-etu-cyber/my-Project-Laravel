<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            // Required string
            $table->string('name');

            // Unique email (important for validation)
            $table->string('email')->unique();

            // Age must be numeric
            $table->unsignedInteger('age');

            // Message required
            $table->text('message');

            // Laravel timestamps (VERY IMPORTANT)
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
