<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisTempatWisata extends Model
{
    use HasFactory, HasUuids;
    protected $table = "jenis_tempat_wisata";
    protected $primaryKey = 'id_jenis_wisata';
    protected $fillable = ['nama', 'deskripsi'];
}
