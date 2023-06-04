<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory, HasUuids;
    protected $table = "pegawai";
    protected $primaryKey = 'id_pegawai';
    protected $fillable = ['nama', 'username', 'password', 'role', 'alamat', 'no_telp', 'foto'];
}
