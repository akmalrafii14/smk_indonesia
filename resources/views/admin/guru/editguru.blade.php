@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')

<div id="content">
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                    <h3>Edit Data Guru</h3>
                    <p>Masukkan Data dengan Benar</p>

                    @if ($errors->any())    
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
            @endif  
                {{-- <a href="/admin/updatedataguru/{{$dataguru->id}}">Cek</a> --}}
                <form  action="/admin/updatedataguru/{{$dataguru->id}}" method="POST" id="formSiswa">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="form-group row">
                        <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-7">
                            <input id="email" type="email" class="form-control" name="email" required value="{{$dataguru->email}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nomor Induk Pegawai') }}</label>

                        <div class="col-md-7">
                            <input id="text" type="text" class="form-control" name="nip" required value="{{$dataguru->nip}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama Lengkap') }}</label>

                        <div class="col-md-7">
                            <input id="text" type="text" class="form-control" name="nama" required value="{{$dataguru->nama}}" autocomplete="name">


                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                        <div class="col-md-7">
                        <select name="jeniskelamin" id="" class="form-control" value="{{$dataguru->jenis_kelamin}}" required>
                                <option disabled selected>Pilih Jenis
                                    Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis" class="col-md-4 col-form-label text-md-right">{{ __('Mata Pelajaran') }}</label>

                        <div class="col-md-7">
                            <select name="prodi" id="" class="form-control" value="{{$dataguru->ProdiGuru->nama}}" required>
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
                        <textarea name="alamat" id="" class="form-control" cols="10" rows="4">{{$dataguru->alamat}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nis"
                            class="col-md-4 col-form-label text-md-right">{{ __('Nomor Handphone') }}</label>

                        <div class="col-md-7">
                        <input type="text" name="no_hp" id="" class="form-control" value="{{$dataguru->no_hp}}">
                            <input type="hidden" name="verify" id="" value="1">

                        </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-md-4">
                                <span></span>
                            </div>
    
                            <div class="col-md-7">
                                    <input type="submit" class="btn btn-primary" form="formSiswa" value="Update Data">
                                    <a href="{{URL('/datasiswa')}}" style="color: #3498db; padding-left:1em;" >Back to List Data</a>
                            </div>
                        </div>
                    
                </form>



            </div>
        </div>
    </div>
</div>
@endsection
