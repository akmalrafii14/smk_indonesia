<?php

namespace App\Model\Guru;

use App\Model\Siswa\Siswa;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = "tb_nilai";

    protected $fillable = [
        'nis_siswa', 'nip_guru', 'id_mapel', 'uh', 'uts', 'uas', 'akhir', 'check_nilai'
    ];

    public function DataNilai()
    {
        return $this->belongsTo(Nilai::class);
    }

    public function DataSiswa()
    {
        return $this->belongsTo(Siswa::class, 'nis_siswa', 'nis');
    }

    public function DataGuru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function NamaMapel()
    {
        return $this->belongsTo(Prodi::class, 'id_mapel', 'id');
    }
}
