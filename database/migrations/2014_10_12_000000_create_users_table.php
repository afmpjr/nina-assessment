<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('location');
            $table->string('religion')->nullable();
            $table->string('personality')->nullable();
            $table->string('dietary_wishes')->nullable();
            $table->json('allergies')->nullable();
            $table->json('language_proficiencies');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
