<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Kriteria Hotel</title>
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
        <h5 class="mb-2">Laporan Data Kriteria Hotel</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tempat Wisata</th>
                <th>Kriteria</th>
                <th>Deskripsi</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($kriteria_tempat_wisata as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->nama_wisata }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->deskripsi }}</td>
                    <td>{{ $p->nilai }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
