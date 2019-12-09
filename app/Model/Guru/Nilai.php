<?php

namespace App\Model\Guru;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = "tb_nilai";

    protected $fillable = [
        'nis_siswa', 'nip_guru', 'id_mapel', 'uh', 'uts', 'uas', 'akhir'
    ];

    public function DataNilai()
    {
        return $this->belongsTo(Nilai::class);
    }
}
