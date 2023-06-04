@extends('template')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <?php if (Session::has("message")): ?>
        <div class="alert alert-info alert-dismissible" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            </button>
        </div>
        <?php endif ?>
        <h4 class="fw-bold py-3 ">
            Tempat Wisata
        </h4>
        <a href="{{ route('tempat-wst.create') }}">
            <button class="btn btn-success mb-4">
                Tambah Data
            </button>
        </a>
        <a href="{{ url('print-tempat-wst') }}" target="_blank">
            <button class="btn btn-info mb-4">
                Cetak PDF
            </button>
        </a>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List Tempat Wisata</h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Tempat Wisata</th>
                            <th>Jenis Tempat Wisata</th>
                            <th>Objek Atraksi</th>
                            <th>Alamat</th>
                            <th>Deskripsi</th>
                            <th>Jam Buka</th>
                            <th>Jam Tutup</th>
                            <th>Kapasitas</th>
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($tempat_wisata as $p)
                            <tr>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->jenis_tempat_wisata }}</td>
                                <td>{{ $p->objek_atraksi }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->deskripsi }}</td>
                                <td>{{ $p->jam_buka }}</td>
                                <td>{{ $p->jam_tutup }}</td>
                                <td>{{ $p->kapasitas }}</td>
                                <td>{{ $p->harga }}</td>
                                <td><img src="{{ url('storage/foto-tempat-wisata/' . $p->foto) }}"
                                        class="avatar avatar-md me-3" ></td>
                                <td class="align-middle">
                                    <form action="{{ route('tempat-wst.destroy', $p->id_tempat_wisata) }}" method="POST">
                                        <a href="{{ route('tempat-wst.edit', $p->id_tempat_wisata) }}"
                                            class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                                            data-original-title="Edit user">
                                            <button class="btn btn-info" type="button">
                                                <i class="bx bx-edit"></i>
                                            </button>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">
                                            <i class="bx bx-trash"></i>
                                        </button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3">
            {!! $tempat_wisata->links('vendor.pagination.bootstrap-5') !!}
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
