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
            Kamar
        </h4>
        <a href="{{ route('kamar.create') }}">
            <button class="btn btn-success mb-4">
                Tambah Data
            </button>
        </a>
        <a href="{{ url('print-kamar') }}" target="_blank">
            <button class="btn btn-info mb-4">
                Cetak PDF
            </button>
        </a>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List Kamar</h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Kamar</th>
                            <th>Nama Hotel</th>
                            <th>Tipe Kamar</th>
                            <th>Harga Kamar</th>
                            <th>Jumlah Kamar</th>
                            <th>Foto</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($kamar as $p)
                            <tr>
                                <td>{{ $p->nama_kamar }}</td>
                                <td>{{ $p->nama_hotel }}</td>
                                <td>{{ $p->tipe_kamar }}</td>
                                <td>{{ $p->harga_kamar }}</td>
                                <td>{{ $p->jumlah_kamar }}</td>
                                <td><img src="{{ url('storage/foto-kamar/' . $p->foto) }}" class="avatar avatar-md me-3"
                                        alt="user1"></td>
                                <td class="align-middle">
                                    <form action="{{ route('kamar.destroy', $p->id_kamar) }}" method="POST">
                                        <a href="{{ route('kamar.edit', $p->id_kamar) }}"
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
            {!! $kamar->links('vendor.pagination.bootstrap-5') !!}
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
