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
            Penilaian
        </h4>
        <a href="{{ route('penilaian.create') }}">
            <button class="btn btn-success mb-4">
                Tambah Data
            </button>
        </a>
        <a href="{{ url('print-penilaian') }}" target="_blank">
            <button class="btn btn-info mb-4">
                Cetak PDF
            </button>
        </a>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List Penilaian</h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Hotel</th>
                            <th>Nama Tempat Wisata</th>
                            <th>Skor</th>
                            <th>Komentar</th>
                            <th>Tanggal Penilaian</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($penilaian as $p)
                            <tr>
                                <td>{{ $p->nama_hotel }}</td>
                                <td>{{ $p->nama_wisata }}</td>
                                <td>{{ $p->skor }}</td>
                                <td>{{ $p->komentar }}</td>
                                <td>{{ $p->tgl_penilaian }}</td>
                                <td class="align-middle">
                                    <form action="{{ route('penilaian.destroy', $p->id_penilaian) }}" method="POST">
                                        <a href="{{ route('penilaian.edit', $p->id_penilaian) }}"
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
            {!! $penilaian->links('vendor.pagination.bootstrap-5') !!}
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
