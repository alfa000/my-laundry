<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $primaryKey = 'no_pemesanan';
    public $timestamps = false;
    public $dates = ['tgl_pesanan', 'tgl_pengambilan'];
    protected $fillable = [
        'id_pelanggan',
        'id_karyawan',
        'kode_jenis_cuci',
        'jumlah',
        'tgl_pesanan',
        'tgl_pengambilan',
        'total_bayar',
        'status_cuci',
        'status_pembayaran',
        'bayar',
        'kembali',
        'keterangan',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(User::class, 'id_pelanggan', 'id_user');
    }

    public function karyawan()
    {
        return $this->belongsTo(User::class, 'id_karyawan', 'id_user');
    }

    public function jenis_cuci()
    {
        return $this->belongsTo(JenisCuci::class, 'kode_jenis_cuci');
    }
}
