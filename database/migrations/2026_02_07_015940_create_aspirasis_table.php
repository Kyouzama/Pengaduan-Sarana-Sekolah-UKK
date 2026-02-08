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
        Schema::create('aspirasis', function (Blueprint $table) {
            $table->id('id_aspirasi');
            $table->foreignId('id_kategori')->constrained('kategoris', 'id_kategori')->onDelete('cascade');
            $table->foreignId('id_user')->constrained('users', 'id')->onDelete('cascade');
            $table->string('judul',100);
            $table->enum('status', ['Menunggu', 'Proses', 'Selesai'])->default('Menunggu')->nullable();
            $table->string('keterangan');
            $table->string('foto')->nullable();
            $table->string('lokasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aspirasis');
    }
};
