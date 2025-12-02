<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelas',
        'level_kelas',
        'tahun_ajar_id',
        'jurusan_id',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

     public function siswas()
    {
        return $this->hasMany(Siswa::class);
    }

    public function kelasDetails()
    {
        return $this->hasMany(KelasDetail::class);
    }
    public function TahunAjar()
    {
        return $this->belongsTo(TahunAjar::class);
    }
    
   
}
