<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisHotel extends Model
{
    use HasFactory, HasUuids;
    protected $table = "jenis_hotel";
    protected $primaryKey = 'id_jenis_hotel';
    protected $fillable = ['nama', 'deskripsi'];
}
