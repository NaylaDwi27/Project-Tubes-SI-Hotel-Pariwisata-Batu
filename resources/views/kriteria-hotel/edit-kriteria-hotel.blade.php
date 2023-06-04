@extends('template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a class="text-muted fw-light" href="{{ route('kriteria-hotel.index') }}">Kriteria Hotel</a>
                /</span> Edit Kriteria Hotel
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
            <h5 class="card-header">Edit Kriteria Hotel</h5>
            <div class="card-body">
                <form action="{{ route('kriteria-hotel.update', $kriteria_hotel->id_kriteria_hotel) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Hotel</label>
                        <select class="form-select" name="id_hotel" id="id_hotel" required>
                            @foreach ($hotel as $k)
                                <option {{ $k->id_hotel == $hotelSaatIni->id_hotel ? 'selected' : '' }}
                                    value="{{ $k->id_hotel }}">
                                    {{ $k->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Kriteria</label>
                        <input type="text" name="kriteria" class="form-control" value="{{ $kriteria_hotel->nama }}" id="basic-default-fullname"
                            placeholder="Masukkan Kriteria">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1"  name="deskripsi">{{ $kriteria_hotel->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nilai</label>
                        <input type="number" min="0" max="10" name="nilai" value="{{ $kriteria_hotel->nilai }}" class="form-control"
                            id="basic-default-fullname" placeholder="Masukkan Nilai dari 0 - 10">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
