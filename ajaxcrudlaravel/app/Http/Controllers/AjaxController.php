<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kategori;
use Buku;

class AjaxController extends Controller
{
    //

    function list_kategori(){
        $data = Kategori::list_kategori();
        return json_encode($data);
    }

    function tambah_buku(Request $request){
        $response = [];
        $nama_buku=$request->nama;
        $id_kategori = $request->kategori;
        $pengarang=$request->pengarang;
        $penerbit=$request->penerbit;
        Buku::tambah_buku($nama_buku,$id_kategori,$pengarang,$penerbit);
        array_push($response,[
            "sukses"=>1,
            "pesan"=>"Data Berhasil Ditambah"
        ]);
        return json_encode($response);
    }

    function list_buku(Request $request){
        $response = [];
        $cari = $request->q;
        $data = Buku::list_buku($cari);
        if(count($data) > 0){
            array_push($response,[
                "sukses" => 1, 
                "data"=>$data
            ]);
        }else{
            array_push($response,[
                "sukses" => 0, 
                "pesan"=>"Data tidak ditemukan"
            ]);
        }

        return json_encode($response);
    }

    function hapus_buku($id_buku){
        $response=[];
        Buku::hapus_buku($id_buku);
        array_push($response,[
            "sukses"=>1,
            "pesan"=>"Data Berhasil Dihapus"
        ]);
        return json_encode($response);
    }

    function detail_buku($id_buku){
        $buku_ada = Buku::where('id_buku', $id_buku)->exists();

        abort_unless($buku_ada, 404);
        $data = Buku::detail_buku($id_buku);
        return json_encode($data);
    }
}
