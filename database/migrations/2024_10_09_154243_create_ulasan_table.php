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
        Schema::create('ulasan', function (Blueprint $table) {
            $table->id();
            $table->string('isiPesan');
            $table->integer('rating');
            $table->unsignedBigInteger('id_user')->nullable(); // Langsung nullable
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade'); // Tambahkan onDelete untuk integritas data
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ulasan');
    }
};
