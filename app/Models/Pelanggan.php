<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_user';
    public $timestamps = false;
    protected $fillable = ['no_hp', 'alamat', 'id_user'];
}
