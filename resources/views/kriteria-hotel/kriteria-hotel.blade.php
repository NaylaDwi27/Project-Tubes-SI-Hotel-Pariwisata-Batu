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
            Kriteria Hotel
        </h4>
        <a href="{{ route('kriteria-hotel.create') }}">
            <button class="btn btn-success mb-4">
                Tambah Data
            </button>
        </a>
        <a href="{{ url('print-kriteria-hotel') }}" target="_blank">
            <button class="btn btn-info mb-4">
                Cetak PDF
            </button>
        </a>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">List Kriteria Hotel</h5>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Hotel</th>
                            <th>Kriteria</th>
                            <th>Deskripsi</th>
                            <th>Nilai</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($kriteria_hotel as $p)
                            <tr>
                                <td>{{ $p->nama_hotel }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->deskripsi }}</td>
                                <td>{{ $p->nilai }}</td>
                                <td class="align-middle">
                                    <form action="{{ route('kriteria-hotel.destroy', $p->id_kriteria_hotel) }}" method="POST">
                                        <a href="{{ route('kriteria-hotel.edit', $p->id_kriteria_hotel) }}"
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
            {!! $kriteria_hotel->links('vendor.pagination.bootstrap-5') !!}
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
@endsection
