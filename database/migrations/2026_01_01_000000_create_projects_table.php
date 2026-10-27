<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Hanya MENAMBAH tabel baru "portofolio_1181" ke database yang sudah ada.
// Tabel lain (users, pelanggan, dll) tidak disentuh.
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portofolio_1181', function (Blueprint $table) {
            $table->id();
            $table->string('title', 80);
            $table->text('description');
            $table->string('image_url')->nullable();
            $table->string('project_url')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portofolio_1181');
    }
};
