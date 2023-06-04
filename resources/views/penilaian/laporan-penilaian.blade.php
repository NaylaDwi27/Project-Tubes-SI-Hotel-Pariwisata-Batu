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
                <th>Nama Hotel</th>
                <th>Nama Tempat Wisata</th>
                <th>Skor</th>
                <th>Komentar</th>
                <th>Tanggal Penilaian</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($penilaian as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->nama_hotel }}</td>
                    <td>{{ $p->nama_wisata }}</td>
                    <td>{{ $p->skor }}</td>
                    <td>{{ $p->komentar }}</td>
                    <td>{{ $p->tgl_penilaian }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
