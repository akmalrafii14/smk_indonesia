@extends('layouts.app')
@extends('layouts.sidebar')
@section('content')


<div id="content">
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h3>Hello, {{ Auth::user()->name }}</h3>
                <p>Data Siswa</p>
                <div class="row search-bar pb-3 pl-3">
                    <form class="form-inline my-2 my-lg-0" action="{{URL('gurudatasiswa/cari')}}" method="GET">
                        <input class="form-control mr-sm-2" type="search" placeholder="Cari Data Siswa"
                            aria-label="Search" name="search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Cari</button>
                    </form>
                </div>

                <table class="table table-hover">
                    <thead>
                        {{-- @foreach ($getStatusNilai as $item)
                                {{$item->check_nilai}}
                        @endforeach --}}
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">NIS</th>
                            <th scope="col">Nama Siswa</th>
                            <th scope="col">Kelas</th>
                            <th scope="col">Jurusan</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                                $no = 1;
                                ?>
                        @foreach ($getSiswa as $data)

                        <tr>
                            <th>{{$no++}}</th>
                            <td>{{$data->nis}}</td>
                            <td>{{$data->nama_siswa}}</td>
                            <td>{{$data->kelas}}</td>
                            <td>{{ $data->jurusanSiswa->nama_jurusan }}</td>
                            <td>

                                <div class="modal-siswa">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#exampleModalDataSiswa{{$data->nis}}">
                                        Lihat Detail
                                    </button>


                                    @foreach ($getStatusNilai as $item)
                                    {{-- {{$item->check_nilai}} --}}


                                    {{-- @if($item->nis_siswa == $data->nis) --}}
                                    @if($item->check_nilai == 1 && $item->nis_siswa == $data->nis && $item->nip_guru == $dataguru->nip)
                                    <a href="/guru/updatenilai/{{$data->id}}"><button type="submit"
                                            class="btn btn-primary">Edit Nilai</button></a>
                                    @else
                                    <a href="/guru/inputnilai/{{$data->id}}"><button type="submit"
                                            class="btn btn-primary">Tambah Nilai</button></a>
                                    @endif


                                    &nbsp;

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalDataSiswa{{$data->nis}}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Data Siswa :
                                                        {{$data->nama_siswa}}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('Nomor Induk Siswa') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            {{$data->nis}}
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('Nama Siswa') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            {{$data->nama_siswa}}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('Jurusan') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            {{ $data->jurusanSiswa->nama_jurusan }}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('Jenis Kelamin') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            {{$data->jenis_kelamin}}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('Alamat') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            {{$data->alamat}}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('Nomor Handpone') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            {{$data->no_hp}}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('E-mail') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            {{$data->email}}
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('Ulangan Harian') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            @if ($item->uh != "" && $item->nis_siswa == $data->nis &&
                                                            $item->nip_guru == $dataguru->nip)
                                                            {{$item->uh}}
                                                            @else
                                                            Data belum dimasukkan
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('Ulangan Tengah Semester') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            @if ($item->uts != "" && $item->nis_siswa == $data->nis &&
                                                            $item->nip_guru == $dataguru->nip)
                                                            {{$item->uts}}
                                                            @else
                                                            Data belum dimasukkan
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label for="nama"
                                                            class="col-md-5 align-right">{{ __('Ulangan Akhir Semester') }}</label>
                                                        <label for="" class="col-md-1">:</label>

                                                        <div class="col-md-6">
                                                            @if ($item->uas != "" && $item->nis_siswa == $data->nis &&
                                                            $item->nip_guru == $dataguru->nip)
                                                            {{$item->uas}}
                                                            @else
                                                            Data belum dimasukkan
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                            <label for="nama"
                                                                class="col-md-5 align-right">{{ __('Rata-rata Nilai') }}</label>
                                                            <label for="" class="col-md-1">:</label>
    
                                                            <div class="col-md-6">
                                                                @if ($item->akhir != "" && $item->nis_siswa == $data->nis &&
                                                                $item->nip_guru == $dataguru->nip)
                                                                {{$item->akhir}}
                                                                @else
                                                                Data belum dimasukkan
                                                                @endif
                                                            </div>
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    @if($item->nis_siswa == $data->nis && $item->nip_guru == $dataguru->nip && $item->check_nilai == 1)
                                                    <a href="/guru/updatenilai/{{$data->id}}"><button type="submit"
                                                            class="btn btn-primary">Edit Nilai</button></a>
                                                    @else
                                                    <a href="/guru/inputnilai/{{$data->id}}"><button type="submit"
                                                            class="btn btn-primary">Tambah Nilai</button></a>
                                                    @endif
                                                    @endforeach



                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>
@endsection
