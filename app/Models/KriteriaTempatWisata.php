<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaTempatWisata extends Model
{
    use HasFactory, HasUuids;
    protected $table = "kriteria_tempat_wisata";
    protected $primaryKey = 'id_kriteria_wisata';
    protected $fillable = ['id_tempat_wisata', 'nama', 'nilai', 'deskripsi'];
}
