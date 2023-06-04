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
            Fasilitas
        </h4>
        <a href="{{ route('fasilitass.create') }}">
            <button class="btn btn-success mb-4">
                Tambah Data
            </button>
        </a>
        <a href="{{ url('print-fasilitas') }}" target="_blank">
            <button class="btn btn-info mb-4">
                Cetak PDF
            </button>
        </a>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List Fasilitas</h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Fasilitas</th>
                            <th>Deskripsi</th>
                            <th>Nama Hotel</th>
                            <th>Nama Tempat Wisata</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($fasilitas as $p)
                            <tr>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->deskripsi }}</td>
                                <td>{{ $p->nama_hotel }}</td>
                                <td>{{ $p->nama_tempat_wisata }}</td>
                                <td class="align-middle">
                                    <form action="{{ route('fasilitass.destroy', $p->id_fasilitas) }}" method="POST">
                                        <a href="{{ route('fasilitass.edit', $p->id_fasilitas) }}"
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
            {!! $fasilitas->links('vendor.pagination.bootstrap-5') !!}
        </div>

        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
