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
        Schema::create('montir', function (Blueprint $table) {
            $table->id();
            $table->string('nama_montir');
            $table->text('pengalaman');
            $table->enum('status',['dalam pengerjaan','selesai']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('montir');
    }
};
