<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Buku extends Model
{
    use HasFactory;

    protected $table = "buku";
    protected $primaryKey = "id_buku";
    protected $fillable = [
        'nama_buku',
        'pengarang',
        'penerbit',
        'id_kategori'
    ];

    static function tambah_buku($nama_buku,$id_kategori,$pengarang,$penerbit){
        Buku::create([
            "nama_buku" => $nama_buku,
            "id_kategori" => $id_kategori,
            "pengarang" => $pengarang,
            "penerbit" => $penerbit,
        ]);
    }

    static function hapus_buku($id_buku){
        $data = Buku::where("id_buku",$id_buku)->first();
        $data->delete();
    }

    static function detail_buku($id_buku){
        $data = DB::table("buku as b")->join("kategori as k","k.id_kategori","=","b.id_kategori")->where("id_buku",$id_buku)->first();
        return $data;
    }

    static function list_buku($nama_buku=""){
        $data = DB::table("buku as b")->join("kategori as k","k.id_kategori","=","b.id_kategori");
        if($nama_buku!=""){
            $data->where("nama_buku","LIKE","%".$nama_buku."%");
        }
       
        return  $data->get();
    }
}
