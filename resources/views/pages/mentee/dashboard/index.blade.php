@extends('layouts.app')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex gap-2 ">
                                    <div class="d-flex shadow-none border p-3 align-items-center">
                                        <i data-feather="award"></i>
                                    </div>
                                    <div class="align-self-center">
                                        <p>Hello <b>{{ Auth::user()->name }}</b>, Welcome Back to Daily Sync Information System. It's great to see you!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex gap-2 ">
                                    <div class="d-flex shadow-none border p-3 align-items-center">
                                        <i data-feather="user"></i>
                                    </div>
                                    <div class="align-self-center">
                                        <h1 class="h5 mb-0">Nama Mentor</h1>
                                        @if (@$mentor)
                                        <h4 class="fw-bold">{{ $mentor->mentor->name }}</h3>
                                        @else
                                        <h4 class="fw-bold">Kamu belum memiliki mentor</h3>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex gap-2 ">
                                    <div class="d-flex shadow-none border p-3 align-items-center">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="align-self-center">
                                        <h1 class="h5 mb-0">Total Aktifitas</h1>
                                        <h4 class="fw-bold">{{ $total_aktifitas }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    
        <script>
            const ctx = document.getElementById('myChart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($months),
                    datasets: [
                        {
                            label: 'Aktifitas',
                            data: @json($activityData),
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        },
                       
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
        @endpush
@endsection
