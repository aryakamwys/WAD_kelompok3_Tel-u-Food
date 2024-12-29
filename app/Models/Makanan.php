<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'deskripsi', 'harga', 'gambar', 'restoran_id'
    ];

    // Relasi banyak ke satu dengan Restoran
    public function restoran()
    {
        return $this->belongsTo(Store::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
