<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = 'layanan'; 
    protected $fillable = ['jenis_layanan', 'tarif', 'deskripsi_layanan'];

    public function barbers()
    {
        return $this->belongsToMany(Barber::class, 'barber_layanan', 'id_layanan', 'id_barber')
            ->withPivot('tarif_khusus')
            ->withTimestamps();
    }
}

