<?php

namespace App\Model\Guru;

use Illuminate\Database\Eloquent\Model;
use App\Model\Siswa\Siswa;

class Prodi extends Model
{
    protected $table = "tb_mapel";

    public function Daftarjurusan()
    {
        return $this->belongsTo(Guru::class, 'id');
    }

    public function Mapel()
    {
        return $this->belongsTo(Siswa::class, 'id');
    }

    // public function MapelNilai()
    // {
    //     return $this->belongsTo(Nilai::class, 'id', 'id_mapel');
    // }
}
