<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('review', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->string('nama');
            $table->string('angkatan');
            $table->string('reviews');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('review');
    }
};
