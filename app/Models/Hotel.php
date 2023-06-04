<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory, HasUuids;
    protected $table = "hotel";
    protected $primaryKey = 'id_hotel';
    protected $fillable = ['id_jenis_hotel', 'nama', 'alamat', 'deskripsi', 'check_in', 'check_out', 'jumlah_kamar', 'foto'];
}
