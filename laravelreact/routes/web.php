<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(["prefix" => "api"],function(){
	 Route::post("/register","App\Http\Controllers\APIController@do_register");
	 Route::post("/login","App\Http\Controllers\APIController@do_login");
	
	Route::get("/kategori","App\Http\Controllers\APIController@list_kategori_produk");
	Route::get("/member","App\Http\Controllers\APIController@list_member");
	Route::get("/produk/{id?}","App\Http\Controllers\APIController@list_produk");
	Route::get("/produk/hapus/{id}","App\Http\Controllers\APIController@do_hapus_produk");
	Route::get("/produk/detail/{id}","App\Http\Controllers\APIController@detail_produk");
	Route::post("/produk/ubah/{id}","App\Http\Controllers\APIController@do_ubah_produk");
	
	Route::post("/produk/tambah","App\Http\Controllers\APIController@do_tambah_produk");
});
