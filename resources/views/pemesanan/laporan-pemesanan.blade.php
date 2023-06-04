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
                <th>Nama Objek Atraksi</th>
                <th>Nama Pegawai</th>
                <th>Tanggal Pemesanan</th>
                <th>Nama Pengunjung</th>
                <th>Alamat Pengunjung</th>
                <th>No Telp</th>
                <th>Total Transaksi</th>
                <th>Metode Pembayaran</th>
                <th>Catatan</th>s
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($pemesanan as $p)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $p->nama_hotel }}</td>
                    <td>{{ $p->nama_wisata }}</td>
                    <td>{{ $p->nama_objek }}</td>
                    <td>{{ $p->nama_pegawai }}</td>
                    <td>{{ $p->tgl_pemesanan }}</td>
                    <td>{{ $p->nama_pengunjung }}</td>
                    <td>{{ $p->alamat_pengunjung }}</td>
                    <td>{{ $p->no_telp }}</td>
                    <td>{{ $p->total_transaksi }}</td>
                    <td>{{ $p->metode_pembayaran }}</td>
                    <td>{{ $p->catatan }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
