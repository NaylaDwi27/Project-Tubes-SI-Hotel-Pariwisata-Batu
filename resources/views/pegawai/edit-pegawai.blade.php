@extends('template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a class="text-muted fw-light" href="{{ route('pegawai.index') }}">Pegawai</a>
                /</span> Edit Pegawai
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
            <h5 class="card-header">Edit Pegawai</h5>
            <div class="card-body">
                <form action="{{ route('pegawai.update', $pegawai->id_pegawai) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama</label>
                        <input type="text" name="nama" value="{{ $pegawai->nama }}" class="form-control"
                            id="basic-default-fullname" placeholder="Masukkan Nama Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Alamat</label>
                        <input type="text" name="alamat" value="{{ $pegawai->alamat }}" class="form-control"
                            id="basic-default-fullname" placeholder="Masukkan Alamat Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">No Telp</label>
                        <input type="text" name="no_telp" value="{{ $pegawai->no_telp }}" class="form-control"
                            id="basic-default-fullname" placeholder="Masukkan No Telp Anda">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Tingkatan</label>
                        <input type="text" name="tingkatan" value="{{ $pegawai->role }}" class="form-control"
                            id="basic-default-fullname" placeholder="Masukkan Tingkatan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Username</label>
                        <input type="text" name="username" value="{{ $pegawai->username }}" class="form-control"
                            id="basic-default-fullname" placeholder="Masukkan Username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Password</label>
                        <input type="text" name="password" value="{{ $pegawai->password }}" class="form-control"
                            id="basic-default-fullname" placeholder="Masukkan Password">
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
