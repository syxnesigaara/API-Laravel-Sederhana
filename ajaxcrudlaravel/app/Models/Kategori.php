<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = "kategori";
    protected $primaryKey = "id_kategori";
    protected $fillable = [
        'nama_kategori',
    ];

    static function tambah_kategori($nama_kategori){
        Kategori::create([
            "nama_kategori" => $nama_kategori
        ]);
    }

    static function list_kategori(){
        $data = Kategori::all();
        return $data;
    }
}
