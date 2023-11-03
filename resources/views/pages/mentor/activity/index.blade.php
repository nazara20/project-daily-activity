@extends('layouts.app')

@section('content')
    <div class="card rounded">
        <div class="card-body">
            <div class="d-flex gap-2 ">
                <div class="d-flex shadow-none border p-3 align-items-center">
                    <i data-feather="activity"></i>
                </div>
                <div class="align-self-center">
                    <h1 class="h3 mb-0">Halaman Aktifitas</h1>
                    <small class="text-muted">Halaman untuk menampilkan data Aktifitas Mentee</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tanggal</th>
                                    <th>Screenshoot</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($activities as $activity)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $activity->user->name }}</td>
                                    <td>{{ $activity->date_activity }}</td>
                                    <td>
                                        <a href="{{ asset('storage/activity/' . $activity->image) }}" target="_blank">
                                            <img src="{{ asset('storage/activity/' . $activity->image) }}" alt="Screenshoot" width="100">
                                        </a>
                                    </td>
                                    <td>{{ $activity->description }}</td>
                                    <td>
                                        @if ($activity->is_approved == false)
                                            <span class="badge bg-warning">Belum Disetujui</span>
                                        @else
                                            <span class="badge bg-success">Disetujui</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                        @if ($activity->is_approved == false)
                                            <form action="{{ route('mentor.activity.approve', $activity->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <i data-feather="check"></i>
                                                    Approve
                                                </button>
                                            </form>
                                        @else
                                        <form action="{{ route('mentor.activity.approve', $activity->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-sm btn-warning">
                                                Batal Approve
                                            </button>
                                        </form>
                                        @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
