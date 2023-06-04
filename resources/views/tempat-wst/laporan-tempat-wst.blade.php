<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Hotel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5 class="mb-2">Laporan Data Hotel</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
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
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($tempat_wst as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->jenis_tempat_wisata }}</td>
                    <td>{{ $p->objek_atraksi }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->deskripsi }}</td>
                    <td>{{ $p->jam_buka }}</td>
                    <td>{{ $p->jam_tutup }}</td>
                    <td>{{ $p->kapasitas }}</td>
                    <td>{{ $p->harga }}</td>
                    <td>
                        <img src="{{ storage_path('app/public/foto-tempat-wisata/' . $p->foto) }}" style="width: 100px">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
