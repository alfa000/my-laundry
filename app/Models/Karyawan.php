<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = ['tgl_lahir', 'karyawan_sejak', 'id_user'];
}
