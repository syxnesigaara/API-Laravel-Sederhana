<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Kategori;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Kategori::tambah_kategori_produk("Pakaian");
        Kategori::tambah_kategori_produk("Minuman");
        Kategori::tambah_kategori_produk("Makanan");
    }
}
