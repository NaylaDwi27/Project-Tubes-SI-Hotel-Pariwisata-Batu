@extends('template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a class="text-muted fw-light" href="{{ route('kriteria-tempat-wst.index') }}">Kriteria Tempat Wisata</a>
                /</span> Edit Kriteria Tempat Wisata
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
            <h5 class="card-header">Edit Kriteria Tempat Wisata</h5>
            <div class="card-body">
                <form action="{{ route('kriteria-tempat-wst.update', $kriteria_tempat_wst->id_kriteria_wisata) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Tempat Wisata</label>
                        <select class="form-select" name="id_tempat_wisata" id="id_tempat_wisata" required>
                            @foreach ($tempatWisata as $k)
                                <option {{ $k->id_tempat_wisata == $tempatSaatIni->id_tempat_wisata ? 'selected' : '' }}
                                    value="{{ $k->id_tempat_wisata }}">
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Kriteria</label>
                        <input type="text" name="kriteria" class="form-control"
                            value="{{ $kriteria_tempat_wst->nama }}" id="basic-default-fullname"
                            placeholder="Masukkan Kriteria">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi">{{ $kriteria_tempat_wst->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nilai</label>
                        <input type="number" min="0" max="10" name="nilai"
                            value="{{ $kriteria_tempat_wst->nilai }}" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan Nilai dari 0 - 10">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
