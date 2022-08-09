<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak_mahasiswa extends Model
{
    protected $table = 'kontrak_mahasiswa';
    public function users()
    {
        return $this->belongsTo(Users::class);
    }
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class);
    }
    use HasFactory;

}
