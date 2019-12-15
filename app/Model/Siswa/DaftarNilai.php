<?php

namespace App\Model\Siswa;

use Illuminate\Database\Eloquent\Model;
use App\Model\Siswa\Siswa;

class DaftarNilai extends Model
{

    protected $table = "tb_nilai";

    public function DataSiswa()
    {
        return $this->hasMany(Siswa::class, 'nis_siswa', 'nis');
    }
}
