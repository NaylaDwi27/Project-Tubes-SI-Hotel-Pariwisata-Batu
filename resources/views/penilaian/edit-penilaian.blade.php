@extends('template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a class="text-muted fw-light" href="{{ route('penilaian.index') }}">Penilaian</a>
                /</span> Edit Penilaian
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
            <h5 class="card-header">Edit Penilaian</h5>
            <div class="card-body">
                <form action="{{ route('penilaian.update', $penilaian->id_penilaian) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Hotel</label>
                        <select class="form-select" name="id_hotel" id="id_hotel" required>
                            @foreach ($hotel as $h)
                                <option {{ $h->id_hotel == $hotelSaatIni->id_hotel ? 'selected' : '' }}
                                    value="{{ $h->id_hotel }}">
                                    {{ $h->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Tempat Wisata</label>
                        <select class="form-select" name="id_tempat_wisata" id="id_tempat_wisata" required>
                            @foreach ($wisata as $p)
                                <option {{ $p->id_tempat_wisata == $wisataSaatIni->id_tempat_wisata ? 'selected' : '' }}
                                    value="{{ $p->id_tempat_wisata }}">
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Skor</label>
                        <input type="number" name="skor" class="form-control" value="{{ $penilaian->skor }}" id="basic-default-fullname"
                            placeholder="Masukkan Skor">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Komentar</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="komentar">{{ $penilaian->komentar }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Tanggal Penilaian</label>
                        <input type="date" name="tgl_penilaian" class="form-control" value="{{ $penilaian->tgl_penilaian }}" id="basic-default-fullname"
                            placeholder="">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
