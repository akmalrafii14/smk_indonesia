@extends('layouts.app')
@section('content')


<div id="content">
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h3>Hello, {{ Auth::user()->name }}</h3>
                <p>What do you wanted to do today?</p>

                <h3 class="py-2">Daftar Nilai</h3>
                <div class="row">
                    <div class="col-sm-12">
                                        
                        @foreach($datanilai as $nilai)
                        <div class="col-sm-6 py-3">
                            
                            <ul class="list-group">
                                    {{-- <h3>{{$datanilai}}</h3> --}}
                                    
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Nilai Ulangan Harian
                                    <span class="badge badge-primary badge-pill">{{$nilai->uh}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Nilai Ujian Tengah Semester
                                    <span class="badge badge-primary badge-pill">{{$nilai->uts}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Nilai Ujian Akhir Semester
                                    <span class="badge badge-primary badge-pill">{{$nilai->uas}}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Nilai Rata-rata
                                    <span class="badge badge-primary badge-pill">{{$nilai->akhir}}</span>
                                </li>
                            </ul>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
