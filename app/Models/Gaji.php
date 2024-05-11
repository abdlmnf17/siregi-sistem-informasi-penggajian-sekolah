<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
