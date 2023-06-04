<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory, HasUuids;
    protected $table = "penilaian";
    protected $primaryKey = 'id_penilaian';
    protected $fillable = ['id_hotel', 'id_tempat_wisata', 'skor', 'komentar', 'tgl_penilaian'];
}
