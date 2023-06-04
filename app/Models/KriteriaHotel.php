<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaHotel extends Model
{
    use HasFactory, HasUuids;
    protected $table = "kriteria_hotel";
    protected $primaryKey = 'id_kriteria_hotel';
    protected $fillable = ['id_hotel', 'nama', 'nilai', 'deskripsi'];
}
