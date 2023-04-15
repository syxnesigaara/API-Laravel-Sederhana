<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\AdminController;


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

Route::get('/',[AdminController::class,"list_buku"]);

Route::group(["prefix"=>"ajax"],function(){
    Route::get('/kategori', [AjaxController::class,"list_kategori"]);
    Route::post('/buku', [AjaxController::class,"tambah_buku"]);
    Route::get('/buku', [AjaxController::class,"list_buku"]);
    Route::delete('/buku/{id}', [AjaxController::class,"hapus_buku"])->where("id","[0-9]+");
    Route::get('/buku/{id}', [AjaxController::class,"detail_buku"])->where("id","[0-9]+");
});
