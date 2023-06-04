@extends('template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a class="text-muted fw-light" href="{{ route('hotel.index') }}">Hotel</a>
                /</span> Edit Hotel
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
            <h5 class="card-header">Edit hotel</h5>
            <div class="card-body">
                <form action="{{ route('hotel.update', $hotel->id_hotel) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Hotel</label>
                        <input type="text" name="nama" value="{{ $hotel->nama }}" class="form-control"
                            id="basic-default-fullname" placeholder="Masukkan Nama Hotel">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Jenis Hotel</label>
                        <select class="form-select" name="id_jenis_hotel" id="id_jenis_hotel" required>
                            @foreach ($jenis as $k)
                                <option {{ $k->id_jenis_hotel == $jenisSaatIni->id_jenis_hotel ? 'selected' : '' }}
                                    value="{{ $k->id_jenis_hotel }}">
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Alamat</label>
                        <input type="text" name="alamat" value="{{ $hotel->alamat }}" class="form-control"
                            id="basic-default-fullname" placeholder="Masukkan Alamat Hotel">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Deskripsi</label>
                        <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1">{{ $hotel->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Jam Check In</label>
                        <input type="text" name="check_in" value="{{ $hotel->check_in }}" class="form-control"
                            id="basic-default-fullname" placeholder="Masukkan Jam Check In Hotel">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Jam Check Out</label>
                        <input type="text" name="check_out" value="{{ $hotel->check_out }}" class="form-control"
                            id="basic-default-fullname" placeholder="Masukkan Jam Check Out Hotel">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Jumlah Kamar</label>
                        <input type="number" name="jumlah_kamar" value="{{ $hotel->jumlah_kamar }}" class="form-control"
                            id="basic-default-fullname" placeholder="Masukkan Jumlah Total Kamar">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Foto Hotel</label>
                        <input class="form-control" name="image" accept="image/*" type="file" id="formFile">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
