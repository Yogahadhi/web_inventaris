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
        Schema::create('komputers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_perangkat')->constrained('laporans')->onUpdate('cascade')->onDelete('cascade')->unique();
            $table->foreignId('nama')->constrained('laporans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('merek')->constrained('laporans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('model')->constrained('laporans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('cpu');
            $table->string('kapasitas_ram');
            $table->string('jenis_ram');
            $table->string('kapasitas_storage');
            $table->string('jenis_storage');
            $table->string('vga');
            $table->set('jaringan', ['Wifi', 'LAN', 'Bluetooth']);
            $table->string('motherboard');
            $table->string('psu');
            $table->string('sistem_operasi');
            $table->enum('kondisi', ['Layak Pakai', 'Perlu Perbaikan', 'Rusak']);
            $table->string('status_teknis');
            $table->date('tanggal');
            $table->foreignId('created_by')->constrained('users')->onUpdate('cascade');
            $table->string('keterangan')->nullable();
            $table->string('fungsi_print')->nullable();
            $table->string('desain')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komputers');
    }
};
