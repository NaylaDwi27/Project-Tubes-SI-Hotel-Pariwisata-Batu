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
            Pemesanan
        </h4>
        <a href="{{ route('pemesanan.create') }}">
            <button class="btn btn-success mb-4">
                Tambah Data
            </button>
        </a>
        <a href="{{ url('print-pemesanan') }}" target="_blank">
            <button class="btn btn-info mb-4">
                Cetak PDF
            </button>
        </a>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List Pemesanan</h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Hotel</th>
                            <th>Nama Tempat Wisata</th>
                            <th>Nama Objek Atraksi</th>
                            <th>Nama Pegawai</th>
                            <th>Tanggal Pemesanan</th>
                            <th>Nama Pengunjung</th>
                            <th>Alamat Pengunjung</th>
                            <th>No Telp</th>
                            <th>Total Transaksi</th>
                            <th>Metode Pembayaran</th>
                            <th>Catatan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($pemesanan as $p)
                            <tr>
                                <td>{{ $p->nama_hotel }}</td>
                                <td>{{ $p->nama_wisata }}</td>
                                <td>{{ $p->nama_objek }}</td>
                                <td>{{ $p->nama_pegawai }}</td>
                                <td>{{ $p->tgl_pemesanan }}</td>
                                <td>{{ $p->nama_pengunjung }}</td>
                                <td>{{ $p->alamat_pengunjung }}</td>
                                <td>{{ $p->no_telp }}</td>
                                <td>{{ $p->total_transaksi }}</td>
                                <td>{{ $p->metode_pembayaran }}</td>
                                <td>{{ $p->catatan }}</td>
                                <td class="align-middle">
                                    <form action="{{ route('pemesanan.destroy', $p->id_pemesanan) }}" method="POST">
                                        <a href="{{ route('pemesanan.edit', $p->id_pemesanan) }}"
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
            {!! $pemesanan->links('vendor.pagination.bootstrap-5') !!}
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
