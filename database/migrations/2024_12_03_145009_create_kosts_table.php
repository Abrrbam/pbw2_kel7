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
        Schema::create('kosts', function (Blueprint $table) {
            $table->id('id_kost');
            $table->string('nama_kost', 30);
            $table->enum('nama_daerah', ['Sukapura', 'Sukabirus', 'PGA', 'Ciganitri', 'PBB', 'Mangga Dua']);
            $table->string('kontak', 15);
            $table->string('alamat');
            $table->enum('tipe_kost', ['Umum', 'Putra', 'Putri']);
            $table->text('deskripsi');
            $table->float('harga');
            $table->string('foto')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kosts');
    }
};
