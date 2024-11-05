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
        Schema::create('produk', function (Blueprint $table) {
            $table->string('kode_produk')->primary();
            $table->string('nama_produk');
            $table->char('kategori_id');
            $table->foreign('kategori_id')->references('kategori_id')->on('kategori');
            $table->integer('stok');
            $table->decimal('harga',10,2);
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
