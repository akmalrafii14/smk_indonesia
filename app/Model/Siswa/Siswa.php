<?php

namespace App\Model\Siswa;

use Illuminate\Database\Eloquent\Model;
use App\Model\Siswa\Jurusan;
use App\Model\Guru\Nilai;
use App\Model\Siswa\Mapel;
use App\Model\Siswa\DaftarNilai;

class Siswa extends Model
{
    protected $table = "tb_siswa";

    protected $fillable = [
        'nis', 'nama_siswa', 'kelas', 'email', 'jenis_kelamin', 'jurusan', 'alamat', 'no_hp', 'verified'
    ];

    public function jurusanSiswa()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan', 'id_jurusan');
    }

    public function Nilai()
    {
        return $this->belongsTo(Nilai::class, 'nis', 'nis_siswa');
    }

    public function NamaMapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id');
    }
}
