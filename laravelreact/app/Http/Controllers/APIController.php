<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use User;
use Validator;
use Auth;

use Kategori;
use Produk;

class APIController extends Controller
{
    //

    function do_tambah_produk(Request $request){
        $response=[];
        $rules = [
            "txt_nama" => "required",
            "cbo_kategori" => "required",
            "txt_harga" => "required|numeric",
            "file_foto" => "required|mimes:jpeg,png",
            
        ];
        $attribute = [
            "txt_nama" => "Nama Produk",
            "file_foto" => "Foto Produk",
            "txt_harga" => "Harga Produk",
            "cbo_kategori" => "Kategori Produk",
        ];
        $message =[
            "required" => ":attribute harus diisi",
            "numeric" => ":attribute harus diisi dengan angka",
            "digits_between" => ":attribute harus diisi antara :min dan :max angka",
            "email" => ":attribute harus diisi dengan format email",
            "unique" => ":attribute sudah digunakan", 
            "same" => ":attribute harus sama dengan :other",
            "chk_setuju.required" => "Harap setujui peraturan kami",
            "rdo_kelamin.required,cbo_jurusan.required" => ":attribute harus dipilih"
        ];

         $val =Validator::make($request->all(),$rules,$message,$attribute);
            if($val->fails()){
              $response["sukses"] =0;
              $response["pesan"] = $val->errors();
                //return back()->withErrors($val,"error_profil");
                return json_encode($response);
            }

             $nama_produk=$request->txt_nama;
             $id_kategori_produk=$request->cbo_kategori;
             $harga_produk=$request->txt_harga;
            
             
            $foto = $request->file_foto;
            $foto_produk=$foto->getClientOriginalName();
            $foto->move("img/produk/",$foto_produk);
           
            Produk::tambah_produk($nama_produk,$id_kategori_produk,$harga_produk,$foto_produk);
            $response["sukses"] =1;
            $response["pesan"] = "Produk berhasil ditambahkan";
            return json_encode($response);
    } 

    function do_ubah_produk(Request $request,$id_produk){
        $response=[];
        $rules = [
            "txt_nama" => "required",
            "cbo_kategori" => "required",
            "txt_harga" => "required|numeric",
            "file_foto" => "mimes:jpeg,png",
            
        ];
        $attribute = [
            "txt_nama" => "Nama Produk",
            "file_foto" => "Foto Produk",
            "txt_harga" => "Harga Produk",
            "cbo_kategori" => "Kategori Produk",
        ];
        $message =[
            "required" => ":attribute harus diisi",
            "numeric" => ":attribute harus diisi dengan angka",
            "digits_between" => ":attribute harus diisi antara :min dan :max angka",
            "email" => ":attribute harus diisi dengan format email",
            "unique" => ":attribute sudah digunakan", 
            "same" => ":attribute harus sama dengan :other",
            "chk_setuju.required" => "Harap setujui peraturan kami",
            "rdo_kelamin.required,cbo_jurusan.required" => ":attribute harus dipilih"
        ];

         $val =Validator::make($request->all(),$rules,$message,$attribute);
            if($val->fails()){
              $response["sukses"] =0;
              $response["pesan"] = $val->errors();
                //return back()->withErrors($val,"error_profil");
                return json_encode($response);
            }

             $nama_produk=$request->txt_nama;
             $id_kategori_produk=$request->cbo_kategori;
             $harga_produk=$request->txt_harga;
            
             
            $foto = $request->file_foto;
            if(!empty($foto)){
                $foto_produk=$foto->getClientOriginalName();
                $foto->move("img/produk/",$foto_produk);
            }else{
                $foto_produk="";
            }
            
            Produk::ubah_produk($id_produk,$nama_produk,$id_kategori_produk,$harga_produk,$foto_produk);
            $response["sukses"] =1;
            $response["pesan"] = "Produk berhasil diubah";
            return json_encode($response);
    } 

     function do_hapus_produk($id_produk){
        Produk::hapus_produk($id_produk);
        $response["sukses"] =1;
        $response["pesan"] = "Produk Berhasil dihapus";
        return json_encode($response);
    } 

     function list_member(){
        $response = [];
        $list = User::list_user();
        
        if(count($list)==0){
            $response["sukses"] = 0;
            $response["pesan"] = "Data tidak ditemukan";
        }else{
            $response["sukses"] = 1;
            $response["data"] = $list;
           
        }
        return json_encode($response);
    }



     function do_login(Request $request){
    	$response = [];
    	$email = $request->txt_email;
    	$password = $request->txt_password;
    	$cek = User::login_user($email,$password);
    	if($cek){
    		$response["sukses"] =1;
    		$response["pesan"] = "Selamat Datang, ".Auth::user()->nama_user;
            $response["data"] = Auth::user();
    	}else{
    		$response["sukses"] =0;
    		$response["pesan"] = "Email dan Password salah";
    	}
    	return json_encode($response);
    }

     function do_register(Request $request){
    	$response=[];
    	$rules = [
    		"txt_nama" => "required",
    		"txt_email" => "required|email|unique:users,email",
    		"txt_password" => "required",
    		"txt_telp" => "required|numeric|digits_between:8,13",
    		"rdo_kelamin" => "required",
    		"txt_tanggal" => "required",
    		"file_foto" => "required|mimes:jpeg,png",
    		"txt_ulangi" => "required|same:txt_password",
    		
    	];
    	$attribute = [
    		"txt_nama" => "Nama Anda",
    		"txt_email" => "Email Anda",
    		"txt_password" => "Password Anda",
    		"txt_ulangi" => "Ulangi Password",
    		"file_foto" => "Foto Anda",
    		"txt_telp" => "Telp Anda",
    		"rdo_kelamin" => "Jenis Kelamin",
    		"txt_tanggal" => "Tanggal Lahir",
    	];
    	$message =[
    		"required" => ":attribute harus diisi",
    		"numeric" => ":attribute harus diisi dengan angka",
    		"digits_between" => ":attribute harus diisi antara :min dan :max angka",
    		"email" => ":attribute harus diisi dengan format email",
    		"unique" => ":attribute sudah digunakan", 
    		"same" => ":attribute harus sama dengan :other",
    		"chk_setuju.required" => "Harap setujui peraturan kami",
    		"rdo_kelamin.required,cbo_jurusan.required" => ":attribute harus dipilih"
    	];

    	 $val =Validator::make($request->all(),$rules,$message,$attribute);
            if($val->fails()){
              $response["sukses"] =0;
              $response["pesan"] = $val->errors();
                //return back()->withErrors($val,"error_profil");
                return json_encode($response);
            }

             $nama_user=$request->txt_nama;
             $email=$request->txt_email;
             $password=$request->txt_password;
             $jenis_kelamin=$request->rdo_kelamin;
             $tanggal_lahir=$request->txt_tanggal;
             $telp=$request->txt_telp;
             
            $foto = $request->file_foto;
	        $foto_user=$foto->getClientOriginalName();
	        $foto->move("img/user/",$foto_user);
           
            User::tambah_user($nama_user,$email,$password,$jenis_kelamin,$tanggal_lahir,$foto_user,$telp);
            $response["sukses"] =1;
            $response["pesan"] = "Sukses Terdaftar";
            return json_encode($response);
    } 

    function list_kategori_produk(){
        $response = [];
        $list = Kategori::list_kategori_produk();
        
        if(count($list)==0){
            $response["sukses"] = 0;
            $response["pesan"] = "Data tidak ditemukan";
        }else{
            $response["sukses"] = 1;
            $response["data"] = $list;
           
        }
        return json_encode($response);
    }

    function list_produk($id_kategori_produk=""){
        $response = [];
        $list = Produk::list_produk($id_kategori_produk);
        
        if(count($list)==0){
            $response["sukses"] = 0;
            $response["pesan"] = "Data tidak ditemukan";
        }else{
            $response["sukses"] = 1;
            $response["data"] = $list;
           
        }
        return json_encode($response);
    }

     function detail_produk($id_produk){
        $response = [];
        $list = Produk::detail_produk($id_produk);
        
        //if(count($list)==0){
            //$response["sukses"] = 0;
            //$response["pesan"] = "Data tidak ditemukan";
        //}else{
            $response["sukses"] = 1;
            $response["data"] = $list;
           
        //}
        return json_encode($response);
    }
}
