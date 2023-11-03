@extends('layouts.app')

@section('content')
    <div class="card rounded">
        <div class="card-body">
            <div class="d-flex gap-2 justify-content-between">
                <div class="d-flex gap-2">
                    <div class="d-flex shadow-none border p-3 align-items-center">
                        <i data-feather="activity"></i>
                    </div>
                    <div class="align-self-center">
                        <h1 class="h3 mb-0">Form Tambah Aktifitas</h1>
                        <small class="text-muted">Halaman untuk menambahkan data Aktifitas Harian</small>
                    </div>
                </div>
                <div>
                    <a href="{{ route('mentee.activity.index') }}">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- code enctype="multipart/form-data" berguna jika ada inputan gambar, jika code itu tidak dimasukkan maka gambar tidak bisa masuk ke dalam penyimpanan project --}}
                <form action="{{ route('mentee.activity.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card bg-white">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tanggal</label>
                                <input type="text" class="form-control" disabled value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Today Plan</label>
                                <textarea type="text" class="form-control" name="todayplan" placeholder="Masukkan Today Plan..." rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Screenshoot</label>
                                <input type="file" class="form-control" name="screenshoot" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
