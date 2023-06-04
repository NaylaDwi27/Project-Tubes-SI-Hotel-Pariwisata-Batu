@extends('template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a class="text-muted fw-light" href="{{ route('fasilitass.index') }}">Fasilitas</a>
                /</span> Tambah Fasilitas
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
            <h5 class="card-header">Tambah Fasilitas</h5>
            <div class="card-body">
                <form action="{{ route('fasilitass.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                        <label class="form-label" for="basic-default-fullname">Nama Tempat Wisata</label>
                        <select class="form-select" name="id_tempat_wisata" id="id_tempat_wisata" required>
                            @foreach ($wisata as $p)
                                <option value="{{ $p->id_tempat_wisata }}">
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Fasilitas</label>
                        <input type="text" name="nama_fasilitas" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan Nama Fasilitas">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
