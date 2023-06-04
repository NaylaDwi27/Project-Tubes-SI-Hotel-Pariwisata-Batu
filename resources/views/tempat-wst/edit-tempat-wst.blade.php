@extends('template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a class="text-muted fw-light" href="{{ route('tempat-wst.index') }}">Tempat Wisata</a>
                /</span> Edit Tempat Wisata
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
            <h5 class="card-header">Edit Tempat Wisata</h5>
            <div class="card-body">
                <form action="{{ route('tempat-wst.update', $tempat_wst->id_tempat_wisata) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Tempat Wisata</label>
                        <input type="text" name="nama" class="form-control" value="{{ $tempat_wst->nama }}" id="basic-default-fullname"
                            placeholder="Masukkan Nama Tempat Wisata">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Jenis Tempat Wisata</label>
                        <select class="form-select" name="id_jenis_wisata" id="id_jenis_wisata" required>
                            @foreach ($jenis as $j)
                                <option {{ $j->id_jenis_wisata == $jenisSaatIni->id_jenis_wisata ? 'selected' : '' }}
                                    value="{{ $j->id_jenis_wisata }}">
                                    {{ $j->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Objek Atraksi</label>
                        <select class="form-select" name="id_objek_atraksi" id="id_objek_atraksi" required>
                            @foreach ($objek as $o)
                                <option {{ $o->id_objek_atraksi == $jenisSaatIni->id_objek_atraksi ? 'selected' : '' }}
                                    value="{{ $o->id_objek_atraksi }}">
                                    {{ $o->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Alamat</label>
                        <input type="text" name="alamat" class="form-control" value="{{ $tempat_wst->alamat }}" id="basic-default-fullname"
                            placeholder="Masukkan Alamat Tempat Wisata">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi">{{ $tempat_wst->deskripsi }}</textarea>

                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Jam Buka</label>
                        <input type="text" name="jam_buka" class="form-control" value="{{ $tempat_wst->jam_buka }}" id="basic-default-fullname"
                            placeholder="Masukkan Jam Buka">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Jam Tutup</label>
                        <input type="text" name="jam_tutup" class="form-control" value="{{ $tempat_wst->jam_tutup }}" id="basic-default-fullname"
                            placeholder="Masukkan Jam Tutup">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Kapasitas Tempat Wisata</label>
                        <input type="number" name="kapasitas" class="form-control" value="{{ $tempat_wst->kapasitas }}" id="basic-default-fullname"
                            placeholder="Masukkan Kapasitas (orang)">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Harga Tiket Masuk</label>
                        <input type="number" name="harga" class="form-control" value="{{ $tempat_wst->harga }}" id="basic-default-fullname"
                            placeholder="Masukkan Harga">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Tempat Wisata</label>
                        <input class="form-control" name="image" accept="image/*" type="file" id="formFile">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
