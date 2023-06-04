@extends('template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a class="text-muted fw-light" href="{{ route('kamar.index') }}">Kamar</a>
                /</span> Tambah Kamar
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
            <h5 class="card-header">Tambah Kamar</h5>
            <div class="card-body">
                <form action="{{ route('kamar.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Kamar</label>
                        <input type="text" name="nama" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan Nama Kamar">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Hotel</label>
                        <select class="form-select" name="id_hotel" id="id_hotel" required>
                            @foreach ($hotel as $p)
                                <option value="{{ $p->id_hotel }}">
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Tipe Kamar</label>
                        <input type="text" name="tipe_kamar" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan Tipe Kamar">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Harga Kamar</label>
                        <input type="number" name="harga_kamar" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan Harga Kamar">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Jumlah Kamar</label>
                        <input type="number" name="jumlah_kamar" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan Jumlah Kamar">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Kamar</label>
                        <input class="form-control" name="image" accept="image/*" type="file" id="formFile">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
