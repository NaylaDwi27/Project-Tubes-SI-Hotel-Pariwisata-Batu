<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory, HasUuids;
    protected $table = "pemesanan";
    protected $primaryKey = 'id_pemesanan';
    protected $fillable = ['id_hotel', 'id_tempat_wisata', 'id_objek_atraksi', 'id_pegawai', 'tgl_pemesanan', 'nama_pengunjung', 'alamat_pengunjung', 'no_telp', 'total_transaksi', 'metode_pembayaran', 'catatan'];
}
