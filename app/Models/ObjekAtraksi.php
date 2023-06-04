<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjekAtraksi extends Model
{
    use HasFactory, HasUuids;
    protected $table = "objek_atraksi";
    protected $primaryKey = 'id_objek_atraksi';
    protected $fillable = ['nama', 'deskripsi', 'tipe_objek', 'harga_masuk'];
}
