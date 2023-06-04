@extends('template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">
                <a class="text-muted fw-light" href="{{ route('pemesanan.index') }}">Pemesanan</a>
                /</span> Edit Pemesanan
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
            <h5 class="card-header">Edit Pemesanan</h5>
            <div class="card-body">
                <form action="{{ route('pemesanan.update', $pemesanan->id_pemesanan) }}" method="POST"
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
                        <label class="form-label" for="basic-default-fullname">Nama Objek Atraksi</label>
                        <select class="form-select" name="id_objek_atraksi" id="id_objek_atraksi" required>
                            @foreach ($objek as $o)
                                <option {{ $o->id_objek_atraksi == $objekSaatIni->id_objek_atraksi ? 'selected' : '' }}
                                    value="{{ $o->id_objek_atraksi }}">
                                    {{ $o->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Pegawai</label>
                        <select class="form-select" name="id_pegawai" id="id_pegawai" required>
                            @foreach ($pegawai as $pe)
                                <option {{ $pe->id_pegawai == $pegawaiSaatIni->id_pegawai ? 'selected' : '' }}
                                    value="{{ $pe->id_pegawai }}">
                                    {{ $pe->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Tanggal Pemesanan</label>
                        <input type="date" name="tgl_pemesanan" value="{{ $pemesanan->tgl_pemesanan }}" class="form-control" id="basic-default-fullname"
                            placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Nama Pengunjung</label>
                        <input type="text" name="nama_pengunjung" value="{{ $pemesanan->nama_pengunjung }}" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan Nama Pengunjung">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Alamat Pengunjung</label>
                        <input type="text" name="alamat_pengunjung" value="{{ $pemesanan->alamat_pengunjung }}" class="form-control" id="basic-default-fullname"
                            placeholder="Masukkan Alamat Pengunjung">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">No Telp</label>
                        <input type="text" name="no_telp" class="form-control" value="{{ $pemesanan->no_telp }}" id="basic-default-fullname"
                            placeholder="Masukkan No Telp Pengunjung">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Total Transaksi</label>
                        <input type="number" name="total_transaksi" value="{{ $pemesanan->total_transaksi }}" class="form-control" id="basic-default-fullname"
                            placeholder="">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Metode Pembayaran</label>
                        <input type="text" name="metode_pembayaran" class="form-control" value="{{ $pemesanan->metode_pembayaran }}" id="basic-default-fullname"
                            placeholder="Masukkan Metode Pembayaran">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="basic-default-fullname">Deskripsi</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi">{{ $pemesanan->catatan }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
