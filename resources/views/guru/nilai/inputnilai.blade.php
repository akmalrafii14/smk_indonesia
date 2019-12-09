@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')

<div id="content">
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                    <h3>Tambah Nilai Siswa</h3>
                    <p>Masukkan Data dengan Benar</p>

                <form method="POST" action="{{URL('admin/inputguru')}}" id="formSiswa">
                    @csrf
                    <div class="form-group row">
                        <label for="nis"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nomor Induk Siswa') }}</label>
                        <div class="col-md-7">
                                <label for="nis"
                                class="col-md-4 col-form-label">{{$datasiswa->nis}}</label>
                                
                            <input id="text" type="hidden" class="form-control" name="nis" value="{{$datasiswa->nis}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                        <div class="col-md-7">
                                <label for="nama"
                                class="col-md-4 col-form-label">{{$datasiswa->nama_siswa}}</label>
                            <input id="text" type="hidden" class="form-control" name="nama" value="{{$datasiswa->nama_siswa}}" required autocomplete="name">


                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                        {{$dataguru->nip}}

                        {{-- <div class="col-md-7">
                            <select name="jeniskelamin" id="" class="form-control" required>
                            <option value="{{$nilais}}"></option>
                            </select>
                        </div> --}}
                    </div>
                    <div class="form-group row">
                        <label for="nis" class="col-md-4 col-form-label text-md-right">{{ __('Mata Pelajaran') }}</label>

                        <div class="col-md-7">
                            <select name="prodi" id="" class="form-control" required>
                                <option disabled selected>Pilih Mata Pelajaran
                                </option>
                                <option value="1">Bahasa Indonesia
                                </option>
                                <option value="2">Bahasa Inggris</option>
                                <option value="3">Matematika</option>
                                <option value="4">Kejuruan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                        <div class="col-md-7">
                            <textarea name="alamat" id="" class="form-control" cols="10" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nomor Handphone') }}</label>

                        <div class="col-md-7">
                            <input type="text" name="no_hp" id="" class="form-control" required>
                            <input type="hidden" name="verify" id="" value="1">

                        </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-md-4">
                                <span></span>
                            </div>
    
                            <div class="col-md-7">
                                    <input type="submit" class="btn btn-primary" form="formSiswa" value="Input Data">
                                    <a href="{{URL('/dataguru')}}" style="color: #3498db; padding-left:1em;" >Back to List Data</a>
                            </div>
                        </div>
                    
                </form>



            </div>
        </div>
    </div>
</div>
@endsection
