<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory, HasUuids;
    protected $table = "fasilitas";
    protected $primaryKey = 'id_fasilitas';
    protected $fillable = ['id_hotel', 'id_tempat_wisata', 'nama', 'deskripsi'];
}
