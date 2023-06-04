<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Fasilitas</title>
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
        <h5 class="mb-2">Laporan Data Fasilitas</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Fasilitas</th>
                <th>Deskripsi</th>
                <th>Nama Fasilitas</th>
                <th>Nama Tempat Wisata</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($fasilitas as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->deskripsi }}</td>
                    <td>{{ $p->nama_hotel }}</td>
                    <td>{{ $p->nama_tempat_wisata }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
