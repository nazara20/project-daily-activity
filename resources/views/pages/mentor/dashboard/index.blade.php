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
                                        <h1 class="h5 mb-0">Total Aktifitas</h1>
                                        <h4 class="fw-bold">0</h3>
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
                                Chart js
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
                        <tr>
                            <td>Nama</td>
                            <td>Tanggal Dibuat</td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
@endsection
