<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisCuci extends Model
{
    use HasFactory;

    protected $primaryKey = 'kode_jenis_cuci';
    public $timestamps = false;
    protected $fillable =['nama',
                        'harga',
                        'satuan',
                        'hari' ];

}
