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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('id_perangkat');
            $table->string('nama');
            $table->enum('kategori', ['Komputer', 'Mouse', 'Monitor', 'Keyboard']);
            $table->string('merek');
            $table->string('model');
            $table->enum('kondisi', ['Layak_Pakai', 'Perlu_Perbaikan', 'Rusak']);
            $table->string('lokasi');
            $table->string('tanggal');
            $table->foreignId('name')->constrained('users')->onUpdate('cascade');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
