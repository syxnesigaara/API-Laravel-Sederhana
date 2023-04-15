<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id("id_produk");
            $table->string('nama_produk');
            $table->foreignId("id_kategori_produk");
            // $table->foreign('id_kategori_bengkel')->references('id_kategori_bengkel')->on('kategori_bengkel');
            $table->integer('harga_produk');
            $table->string('foto_produk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
