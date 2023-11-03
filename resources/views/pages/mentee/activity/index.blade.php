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
                    <small class="text-muted">Halaman untuk menampilkan data Aktifitas Harian</small>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if ($today == @$latestActivity->date_activity)
                <span class="badge bg-success p-2">Kamu sudah menambahkan Aktifitas Harian hari ini</span>
                @else
                <div class="p-3">
                    <a href="{{ route('mentee.activity.create') }}" class="btn btn-primary">
                        <i data-feather="plus"></i>
                        Tambah Aktifitas
                    </a>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
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
                                        @if ($activity->is_approved == false)
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('mentee.activity.edit', $activity->id) }}" class="btn btn-sm btn-success">
                                                <i data-feather="edit"></i>
                                                Edit
                                            </a>
                                            <form action="{{ route('mentee.activity.destroy', $activity->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i data-feather="trash"></i>
                                                    Hapus
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
