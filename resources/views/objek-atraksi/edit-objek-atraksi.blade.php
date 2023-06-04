@extends('template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a class="text-muted fw-light" href="{{ route('objek-atraksi.index') }}">Objek Atraksi</a>
                /</span> Edit Objek Atraksi
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
            <h5 class="card-header">Edit Objek Atraksi</h5>
            <div class="card-body">
                <form action="{{ route('objek-atraksi.update', $objek_atraksi->id_objek_atraksi) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Objek Atraksi</label>
                        <input type="text" name="nama" class="form-control" value="{{ $objek_atraksi->nama }}" id="basic-default-fullname"
                            placeholder="Masukkan Nama Objek Atraksi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi">{{ $objek_atraksi->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Tipe Objek Atraksi</label>
                        <input type="text" name="tipe_objek" class="form-control" value="{{ $objek_atraksi->tipe_objek }}" id="basic-default-fullname"
                            placeholder="Masukkan Tipe Objek Atraksi">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Harga Tiket Masuk</label>
                        <input type="number" name="harga_masuk" class="form-control" value="{{ $objek_atraksi->harga_masuk }}" id="basic-default-fullname"
                            placeholder="Masukkan Harga Tiket Masuk">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
