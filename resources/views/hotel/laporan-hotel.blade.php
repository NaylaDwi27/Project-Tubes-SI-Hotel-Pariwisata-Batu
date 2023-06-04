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
                <th>Jenis Hotel</th>
                <th>Alamat</th>
                <th>Deskripsi</th>
                <th>Jam Check In</th>
                <th>Jam Check Out</th>
                <th>Jumlah Kamar</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($hotel as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->jenis_hotel }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->deskripsi }}</td>
                    <td>{{ $p->check_in }}</td>
                    <td>{{ $p->check_out }}</td>
                    <td>{{ $p->jumlah_kamar }}</td>
                    <td>
                        <img src="{{ storage_path('app/public/foto-hotel/' . $p->foto) }}" style="width: 100px">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
