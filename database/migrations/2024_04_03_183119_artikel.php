<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->enum('kategori', ['berita', 'kegiatan', 'video', 'profile', 'pengumuman', 'tentang_kami', 'hubungi_kami', 'kepala_sekolah', 'tata_tertib', 'fasilitas', 'gallery']);
            $table->integer('author');
            $table->string('img');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
