<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $data= ["Komik","Novel","Komputer","Bisnis","Majalah"];
        foreach ($data as $d) {
            Kategori::tambah_kategori($d);
        }
    }
}
