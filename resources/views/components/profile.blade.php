<div class="card rounded">
    <div class="card-body">
        <div class="d-flex gap-2 justify-content-between">
            <div class="d-flex gap-2">
                <div class="d-flex shadow-none border p-3 align-items-center">
                    <i data-feather="settings"></i>
                </div>
                <div class="align-self-center">
                    <h1 class="h3 mb-0">Profile</h1>
                    <small class="text-muted">Halaman untuk mengatur Halaman Profile</small>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="card position-relative mt-5">
    <div class="position-absolute" style="top: -20px; left:20px">
        <div class="d-flex">
        <img src="{{ asset('assets/img/avatars/avatar.jpg') }}" width="90px" class="rounded-circle border border-5" alt="">
         <div class="align-self-center ms-3">
            <span class="fw-bold">{{ Auth::user()->name  }}</span> <br/>
            <span>{{ Auth::user()->role->name }}</span>
         </div>
       </div>
       <hr>
    </div>
    <div class="card-body p-5">
        <div class="row">
            <div class="col-md-6 mb-4 mt-5">
                <label class="form-label fw-bold">Nama</label>
                <div>{{ Auth::user()->name }}</div>
            </div>
            <div class="col-md-6 mb-4 mt-5">
                <label class="form-label fw-bold">Email</label>
                <div>{{ Auth::user()->email }}</div>
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label fw-bold">Role</label>
                <div>{{ Auth::user()->role->name }}</div>
            </div>
            <div class="col-md-6 mb-4">
                <label class="form-label fw-bold">Divisi</label>
                <div>{{ Auth::user()->division->name }}</div>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('mentor.profile.edit', Auth::user()->id) }}" class="btn btn-sm btn-outline-secondary px-4">
             <i data-feather="edit"></i>
                Edit Profile
            </a>
        </div>
    </div>
</div>
