<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'id_pelanggan',
        'id_barber',
        'id_pesanan',
        'id_history',
        'nama_pelanggan',
        'nama_barber',
        'jenis_layanan',
        'rating',
        'komentar',
    ];

    public function pelanggan() {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function layanan() {
        return $this->belongsTo(Layanan::class, 'id_pesanan');
    }
}
