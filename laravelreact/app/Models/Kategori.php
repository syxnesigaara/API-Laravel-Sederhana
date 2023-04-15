<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $primaryKey = "id_kategori_produk";
    
    protected $table = "kategori";

    protected $fillable = [
         'nama_kategori_produk',
    ];

    static function tambah_kategori_produk($nama_kategori_produk){
    	Kategori::create([
    		
    		"nama_kategori_produk" => $nama_kategori_produk,
    		
    	]);
    }

   

    static function list_kategori_produk(){
    	$data = Kategori::all();
    	return $data;
    }

    
}
