<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('makanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->integer('harga');
            $table->string('gambar')->nullable();
            $table->foreignId('restoran_id')->constrained()->onDelete('cascade'); // Menambahkan relasi ke restoran
            $table->timestamps();
        });

        Schema::table('makanan', function (Blueprint $table) {
            $table->unsignedBigInteger('store_id');  // Kolom untuk relasi Store
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('makanans');
    }
};
