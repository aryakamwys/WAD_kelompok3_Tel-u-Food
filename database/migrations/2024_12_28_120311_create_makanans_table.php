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
    }
    
    public function down()
    {
        Schema::dropIfExists('makanans');
    }
};
