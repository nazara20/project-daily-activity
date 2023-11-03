@extends('layouts.app')

@section('content')
        <h6 class="text-muted">Hello Mentor {{ Auth::user()->name }}, Welcome Back to Daily Sync Information System. It's great to see you!</h6>
        <div class="row">
            <div class="col-md-7">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex gap-2 ">
                                    <div class="d-flex shadow-none border p-3 align-items-center">
                                        <i data-feather="activity"></i>
                                    </div>
                                    <div class="align-self-center">
                                        <h1 class="h5 mb-0">Total Aktifitas Mentee</h1>
                                        <h4 class="fw-bold">{{ $total_aktifitas }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex gap-2 ">
                                    <div class="d-flex shadow-none border p-3 align-items-center">
                                        <i data-feather="user"></i>
                                    </div>
                                    <div class="align-self-center">
                                        <h1 class="h5 mb-0">Total Mentee</h1>
                                        <h4 class="fw-bold">{{ $total_mentee }}</h3>
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
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        Log Aktifitas Mentee
                    </div>
                    <table class="table">
                        @forelse ($activities as $activity)
                            <tr>
                                <td class="fw-bold">
                                    {{ $activity->user->name }}<br/>
                                <small class="text-muted">
                                 
                                </small>
                                </td>
                                <td>
                                    <small>
                                        Menambahkan Aktifitas pada tanggal
                                        <br />
                                       <b> {{ \Carbon\Carbon::parse($activity->created_at)->isoformat('DD MMMM YYYY') }}</b>
                                    </small>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center fw-bold">
                                Tidak ada data
                            </td>
                        </tr>
                        @endforelse
                    </table>
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
