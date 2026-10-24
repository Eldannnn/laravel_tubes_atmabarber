<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barber extends Model
{
    use HasFactory;

    protected $table = 'barbers';

    protected $fillable = [
        'nama_barber',    
        'kontak_barber',
        'deskripsi',
    ];

    public function layanan()
    {
        return $this->belongsToMany(Layanan::class, 'barber_layanan', 'id_barber', 'id_layanan')
            ->withPivot('tarif_khusus')
            ->withTimestamps();
    }
}
