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
        Schema::create('properti', function (Blueprint $table) {
            $table->increments('id_properti');
            $table->unsignedInteger('id_kategori');
            $table->string('gambar', 200);
            $table->string('judul', 50);
            $table->decimal('harga', 50, 0);
            $table->string('lokasi', 100);
            $table->tinyInteger('kamar_tidur');
            $table->tinyInteger('kamar_mandi');
            $table->text('deskripsi', 1000);
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properti');
    }
};
