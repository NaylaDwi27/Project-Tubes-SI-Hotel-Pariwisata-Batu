@extends('template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a class="text-muted fw-light" href="{{ route('pegawai.index') }}">Pegawai</a>
                /</span> Tambah Pegawai
        </h4>


        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="">{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Tambah Pegawai</h5>
            <div class="card-body">
                <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama</label>
                        <input type="text" name="nama" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan Nama Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan Alamat Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">No Telp</label>
                        <input type="text" name="no_telp" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan No Telp Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Tingkatan</label>
                        <input type="text" name="tingkatan" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan Tingkatan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Username</label>
                        <input type="text" name="username" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan Username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Password</label>
                        <input type="text" name="password" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan Password">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Pegawai</label>
                        <input class="form-control" name="image" accept="image/*" type="file" id="formFile">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
