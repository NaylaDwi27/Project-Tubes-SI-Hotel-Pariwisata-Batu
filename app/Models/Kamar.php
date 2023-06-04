<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory, HasUuids;
    protected $table = "kamar";
    protected $primaryKey = 'id_kamar';
    protected $fillable = ['id_hotel', 'tipe_kamar', 'nama_kamar', 'harga_kamar', 'jumlah_kamar', 'foto'];
}
