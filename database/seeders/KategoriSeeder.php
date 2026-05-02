<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create(['name_kategori' => 'Elektronik','kode_kategori'=>'CAT-001','deskripsi'=> 'gadget elektronik']);
        Kategori::create(['name_kategori' => 'Pakaian','kode_kategori'=>'CAT-002','deskripsi'=> 'pakaian pria']);
        Kategori::create(['name_kategori' => 'Kebutuhan Pokok','kode_kategori'=>'CAT-003','deskripsi'=> 'Bahan Makanan']);
    }
}
