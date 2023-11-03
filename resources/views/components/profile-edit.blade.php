<div class="card rounded">
    <div class="card-body">
        <div class="d-flex gap-2 justify-content-between">
            <div class="d-flex gap-2">
                <div class="d-flex shadow-none border p-3 align-items-center">
                    <i data-feather="settings"></i>
                </div>
                <div class="align-self-center">
                    <h1 class="h3 mb-0">Edit Profile</h1>
                    <small class="text-muted">Halaman untuk mengedit data Profile</small>
                </div>
            </div>
            <div>
                <a href="javascript:history.back()">Kembali</a>
            </div>
        </div>
    </div>
</div>


<div class="card position-relative mt-5">
    <div class="position-absolute" style="top: -20px; left:20px">
        <div class="d-flex">
            <img src="{{ asset('assets/img/avatars/avatar.jpg') }}" width="90px"
                class="rounded-circle border border-5" alt="">
            <div class="align-self-center ms-3">
                <span class="fw-bold">{{ Auth::user()->name }}</span> <br />
                <span>{{ Auth::user()->role->name }}</span>
            </div>
        </div>
        <hr>
    </div>

        
    
        @if (Auth::user()->role->name == 'Mentor' || Auth::user()->role->name == 'mentor')
        <form action="{{ route('mentor.profile.update', Auth::user()->id) }}" method="post">
            @elseif (Auth::user()->role->name == 'Mentee' || Auth::user()->role->name == 'mentee')
        <form action="{{ route('mentee.profile.update', Auth::user()->id) }}" method="post">
        @endif

 
            @csrf
        @method('PUT')
        <div class="card-body p-5">
            <div class="row">
                <div class="col-md-6 mb-4 mt-5">
                    <label class="form-label fw-bold">Nama</label>
                    <input class="form-control" required type="text" name="name" value="{{ Auth::user()->name }}">
                </div>
                <div class="col-md-6 mb-4 mt-5">
                    <label class="form-label fw-bold">Email</label>
                    <input class="form-control" required type="text" name="email"
                        value="{{ Auth::user()->email }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Role</label>
                    <input class="form-control" required type="text" name="role" disabled
                        value="{{ Auth::user()->role->name }}">
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Divisi</label>
                    <input class="form-control" required type="text" name="role" disabled
                        value="{{ Auth::user()->division->name ?? '-' }}">
                </div>
            </div>

            <hr>
            <div class="row">
                <small>Jika tidak ingin mengubah password, kosongkan data password</small>
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Password</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label fw-bold">Konfirmasi Password</label>
                    <input class="form-control" type="password" name="confirm_password">
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-sm btn-outline-primary px-4">
                    <i data-feather="edit"></i>
                    Submit
                </button>
            </div>
    </form>

</div>
</div>
