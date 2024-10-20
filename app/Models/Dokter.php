<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'spesialisasi',
        'no_izin_praktek',
    ];

    public function janjiTemus()
    {
        return $this->hasMany(JanjiTemu::class);
    }

    public function rekamMedis()
    {
        return $this->hasMany(RekamMedis::class);
    }
}
