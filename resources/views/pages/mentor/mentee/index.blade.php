@extends('layouts.app')

@section('content')
    <div class="card rounded">
        <div class="card-body">
            <div class="d-flex gap-2 ">
                <div class="d-flex shadow-none border p-3 align-items-center">
                    <i data-feather="users"></i>
                </div>
                <div class="align-self-center">
                    <h1 class="h3 mb-0">Halaman Mentee</h1>
                    <small class="text-muted">Halaman untuk menampilkan data Mentee pada mentor <b>{{ Auth::user()->name }}</b></small>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    Jumlah Mentee : {{ $mentees->count() }}
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Tanggal ditambahkan</th>
                            </tr>
                            @forelse ($mentees as $mentee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mentee->user->name }}</td>
                                    <td>{{ $mentee->user->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($mentee->created_at)->isoformat('DD MMMM YYYY') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center fw-bold">
                                        Data Not Found
                                    </td>
                                </tr>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
