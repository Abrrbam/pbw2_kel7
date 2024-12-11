<?php

namespace Database\Seeders;

use App\Models\Kost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $table->string('nama_kost', 30);
        //     $table->enum('nama_daerah', ['Sukapura', 'Sukabirus', 'PGA', 'Ciganitri', 'PBB', 'Mangga Dua']);
        //     $table->string('kontak', 15);
        //     $table->string('alamat');
        //     $table->enum('tipe_kost', ['Umum', 'Putra', 'Putri']);
        //     $table->text('deskripsi');
        //     $table->float('harga');
        //     $table->string('foto')->nullable();
        Kost::create([
            'nama_kost' => 'Kost Sukapura',
            'nama_daerah' => 'Sukapura',
            'kontak' => '083892314914',
            'alamat' => 'Alamat Sukapura',
            'tipe_kost' => 'Umum',
            'deskripsi' => 'Deskripsi kost sukapura',
            'harga' => 1000000.00,
        ]);
        Kost::create([
            'nama_kost' => 'Kost Sukabirus',
            'nama_daerah' => 'Sukabirus',
            'kontak' => '082124305125',
            'alamat' => 'Alamat Sukabirus',
            'tipe_kost' => 'Putra',
            'deskripsi' => 'Deskripsi kost sukabirus',
            'harga' => 3000000.00,
        ]);
    }
}
