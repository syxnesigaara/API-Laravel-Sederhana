<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Produk::tambah_produk("Es Teler",2,20000,"es teler.jpg");
        Produk::tambah_produk("Es Campur",2,15000,"5213463=s1280=h960.jpg");
        Produk::tambah_produk("Es Jeruk",2,19000,"es-jeruk-foto-resep-utama.jpg");

        Produk::tambah_produk("Celana Jeans",1,109000,"12135754_blue_denim_1.jpg");
        Produk::tambah_produk("Daster",1,39000,"DASTER_BATIK___DASTER_TERBARU___Grosir_baju_produk_daster_fa.jpg");
        Produk::tambah_produk("Tank Top",1,49000,"nathalie-3698-8024202-1.jpg");

 		Produk::tambah_produk("Soto Ayam",3,28000,"d3cb3b7a-aa3a-4e0a-a0d4-83828a40b5d5_43.jpg");
        Produk::tambah_produk("Mie Goreng",3,15000,"mie-goreng-korea.jpg");
        Produk::tambah_produk("Sate Kambing",3,19000,"resep-sate-kambing-empuk-e1577727475625.jpg");

    }
}
