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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->unsignedBigInteger('id_montir');
            $table->foreign('id_montir')->references('id')->on('montir');
            $table->text('keluhan');
            $table->decimal('estimasi_harga',10,2);
            $table->time('booking_jam');
            $table->date('booking_tanggal');
            $table->dateTime('tgl_booking');
            $table->enum('status',['Pengerjaan','Selesai']);
            $table->string('kode_jasa');
            $table->foreign('kode_jasa')->references('kode_jasa')->on('jasa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
