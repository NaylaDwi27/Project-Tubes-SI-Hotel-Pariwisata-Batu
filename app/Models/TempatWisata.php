<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatWisata extends Model
{
    use HasFactory, HasUuids;
    protected $table = "tempat_wisata";
    protected $primaryKey = 'id_tempat_wisata';
    protected $fillable = ['id_jenis_wisata', 'id_objek_atraksi', 'nama', 'alamat', 'deskripsi', 'jam_buka', 'jam_tutup', 'kapasitas', 'harga', 'foto'];
}
