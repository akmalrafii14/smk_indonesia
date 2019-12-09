@extends('layouts.app')
@section('content')


<div id="content">
    <div class="container py-4">
        <div class="card">
            <div class="card-body">
                <h3>Hello, {{ Auth::user()->name }}</h3>
                <p>What do you wanted to do today?</p>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="card" style="width: 18rem; width: 100%">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4" style="margin: 0 auto;">
                                        <i class="fas fa-user fa-7x"></i>
                                    </div>
                                    <div class="col-sm-8">
                                        <h3>Jumlah Guru yang Terdaftar</h3>
                                        <p>{{$getGuru->count()}} Guru</p>
                                        <a href="{{URL('/dataguru')}}">
                                                <button type="button" class="btn btn-primary">Lihat Data Guru</button>
                                        </a>
                                    </div>
                                </div>
                                {{-- <h5 class="card-title">Card title</h5>
                                  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                  <a href="#" class="card-link">Card link</a>
                                  <a href="#" class="card-link">Another link</a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card" style="width: 18rem; width: 100%">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <i class="fas fa-user fa-7x"></i>
                                    </div>
                                    <div class="col-sm-8">
                                        <h3>Jumlah Siswa yang Terdaftar</h3>
                                        <p>{{$getSiswa->count()}} Siswa</p>
                                    <a href="{{URL('/datasiswa')}}">
                                                <button type="button" class="btn btn-primary">Lihat Data Siswa</button>
                                        </a>
                                    </div>
                                </div>

                                {{-- <h5 class="card-title">Card title</h5>
                                      <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                      <a href="#" class="card-link">Card link</a>
                                      <a href="#" class="card-link">Another link</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row py-5">
                    <div class="col-sm-12">

                        <h3>Data Sekolah</h3>
                            <canvas id="myChart" width="400" height="100"></canvas>
                            <script>
                            var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: ['2014', '2015', '2016', '2017', '2018', '2019'],
                                    datasets: [{
                                        label: 'Jumlah Pemasukkan Data SMK Indonesia',
                                        data: [4, 9, 17, 12, 28, 42],
                                        // backgroundColor: [
                                        //     'rgba(255, 99, 132, 0.2)',
                                        //     'rgba(54, 162, 235, 0.2)',
                                        //     'rgba(255, 206, 86, 0.2)',
                                        //     'rgba(75, 192, 192, 0.2)',
                                        //     'rgba(153, 102, 255, 0.2)',
                                        //     'rgba(255, 159, 64, 0.2)'
                                        // ],
                                        borderColor: [
                                            'rgba(255, 99, 132, 1)',
                                            'rgba(54, 162, 235, 1)',
                                            'rgba(255, 206, 86, 1)',
                                            'rgba(75, 192, 192, 1)',
                                            'rgba(153, 102, 255, 1)',
                                            'rgba(255, 159, 64, 1)'
                                        ],
                                        fill: false,
                                        
                                        borderWidth: 4
                                    }]
                                },
                                options: {
                                    scales: {
                                        yAxes: [{
                                            ticks: {
                                                beginAtZero: true
                                            }
                                        }]
                                    }
                                }
                            });
                            </script>
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>
@endsection
