<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Jenis Tempat Wisata</title>
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
        <h5 class="mb-2">Laporan Data Jenis Tempat Wisata</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Jenis Tempat Wisata</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($jenis_tempat_wst as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->deskripsi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
