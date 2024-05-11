<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nama',
        'nip',
        'jabatan',
        'jenis_kelamin',
        'no_rekening',
        'nama_rekening',
        'ttl',
        'profile_photo',


    ];

    public function gaji()
    {
        return $this->hasOne(Gaji::class);
    }
}
