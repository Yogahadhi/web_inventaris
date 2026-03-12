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
        Schema::create('stock_opnames', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('nama');
            $table->string('jumlah');
            $table->string('lokasi');
            $table->date('tanggal');
            $table->enum('kondisi', ['Baik', 'Perlu Pengecekan', 'Rusak']);
            $table->foreignId('created_by')->constrained('users')->onUpdate('cascade');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_opnames');
    }
};
