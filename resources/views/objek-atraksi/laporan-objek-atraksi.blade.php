<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Objek Atraksi</title>
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
        <h5 class="mb-2">Laporan Data Objek Atraksi</h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Tipe Objek</th>
                <th>Harga Masuk</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($objek_atraksi as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->deskripsi }}</td>
                    <td>{{ $p->tipe_objek }}</td>
                    <td>{{ $p->harga_masuk }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
