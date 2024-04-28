<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('activity', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('nama');
            $table->string('waktu');
            $table->text('content');
            $table->string('total_siswa');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity');
    }
};
