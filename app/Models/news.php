<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    public $table = "news";

    protected $fillable = [
        'penulis', 'deskripsi','judul', 'gambar', 'tanggal'
    ];
}
