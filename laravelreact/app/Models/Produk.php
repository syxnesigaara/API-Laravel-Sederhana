<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Produk extends Model
{
    use HasFactory;

    protected $primaryKey = "id_produk";
    public $timestamps = false;
    protected $table = "produk";

    protected $fillable = [
         'nama_produk','id_kategori_produk','harga_produk','foto_produk',
    ];

    static function tambah_produk($nama_produk,$id_kategori_produk,$harga_produk,$foto_produk){
    	Produk::create([
    		"nama_produk" => $nama_produk,
    		"id_kategori_produk" => $id_kategori_produk,
    		"harga_produk" => $harga_produk,
    		"foto_produk" => $foto_produk,
    		
    	]);
    }

    static function ubah_produk($id_produk,$nama_produk,$id_kategori_produk,$harga_produk,$foto_produk=""){
    	$data = Produk::where("id_produk",$id_produk)->first();
    	$data->nama_produk = $nama_produk;
    	$data->id_kategori_produk = $id_kategori_produk;
    	$data->harga_produk = $harga_produk;
    	if($foto_produk!=""){
    		$data->foto_produk = $foto_produk;	
    	}
    	
    	$data->save();
    }

    static function list_produk(/*$nama_produk="",*/$id_kategori_produk=""){
    	$data = DB::table("produk as b")->join("kategori as kb","b.id_kategori_produk","=","kb.id_kategori_produk");
    	/*if($nama_produk!=""){
    		$data->where("nama_produk","LIKE","%".$nama_produk."%") ;
    	}*/
        if($id_kategori_produk!=""){
            $data->where("b.id_kategori_produk","=",$id_kategori_produk) ;
        }

    	return $data->orderBy("nama_produk","asc")->get();
    }

     static function detail_produk($id_produk){
    	$data = DB::table("produk as b")->join("kategori as kb","b.id_kategori_produk","=","kb.id_kategori_produk")->where("id_produk",$id_produk)->first();
    	
    	return $data;
    }

     static function hapus_produk($id_produk){
    	$data = produk::where("id_produk",$id_produk)->first();
    	$data->delete();
    }
}
