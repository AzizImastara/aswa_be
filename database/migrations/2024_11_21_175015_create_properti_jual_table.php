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
        Schema::create('properti_jual', function (Blueprint $table) {
            $table->increments('id_properti_jual');
            $table->unsignedInteger('id_kategori');
            $table->unsignedBigInteger('id_user');
            $table->string('judul', 100);
            $table->char('no_telepon', 15);
            $table->decimal('harga', 50, 0);
            $table->string('lokasi', 200);
            $table->tinyInteger('kamar_tidur');
            $table->tinyInteger('kamar_mandi');
            $table->string('gambar', 200);
            $table->text('deskripsi', 1000);

            $table->foreign('id_kategori')->references('id_kategori')->on('kategori');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properti_jual');
    }
};
