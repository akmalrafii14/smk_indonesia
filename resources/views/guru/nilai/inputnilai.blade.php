@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')

<div id="content">
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h3>Tambah Nilai Siswa</h3>
                <p>Masukkan Data dengan Benar</p>

                <div class="alert alert-warning" role="alert">
                    Pastikan data yang dimasukkan sudah benar!
                </div>
                <form method="POST" action="{{route('inputnilai')}}" id="formSiswa" class="pt-3">
                    @csrf
                    <h3>Data Guru</h3>
                    <div class="form-group row">
                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Guru') }}</label>

                        <div class="col-md-7">
                            <label for="nama" class="col-md-4 col-form-label">{{$dataguru->nama}}</label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nis"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nomor Induk Pegawai') }}</label>
                        <div class="col-md-7">
                            <label for="nis" class="col-md-4 col-form-label">{{$dataguru->nip}}</label>

                            <input id="text" type="hidden" class="form-control" name="nip" value="{{$dataguru->nip}}"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis"
                            class="col-md-4 col-form-label text-md-right">{{ __('Mata Pelajaran') }}</label>
                        <div class="col-md-7">
                            <label for="nis" class="col-md-4 col-form-label">{{$dataguru->ProdiGuru->nama}}</label>

                            <input id="text" type="hidden" class="form-control" name="mapel"
                                value="{{$dataguru->prodi}}" required>
                        </div>
                    </div>

                    <h3>Data Siswa</h3>
                    <div class="form-group row">
                        <label for="nis"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nomor Induk Siswa') }}</label>
                        <div class="col-md-7">
                            <label for="nis" class="col-md-4 col-form-label">{{$datasiswa->nis}}</label>

                            <input id="text" type="hidden" class="form-control" name="nis" value="{{$datasiswa->nis}}"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                        <div class="col-md-7">
                            <label for="nama" class="col-md-4 col-form-label">{{$datasiswa->nama_siswa}}</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nilai Ulangan Harian') }}</label>

                        <div class="col-md-7">
                            <input type="number" max="100" min="0" name="uh" id="" class="form-control" required>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nilai Ulangan Tengah Semester') }}</label>

                        <div class="col-md-7">
                            <input type="number" max="100" min="0" name="uts" id="" class="form-control" required>

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nilai Akhir Semester') }}</label>

                        <div class="col-md-7">
                            <input type="number" max="100" min="0" name="uas" id="" class="form-control" required>

                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-4">
                            <span></span>
                        </div>

                        <div class="col-md-7">
                            <input type="submit" class="btn btn-primary" form="formSiswa" value="Input Nilai">
                            <a href="{{URL('/dataguru')}}" style="color: #3498db; padding-left:1em;">Back to List
                                Data</a>
                        </div>
                    </div>

                </form>



            </div>
        </div>
    </div>
</div>
@endsection
