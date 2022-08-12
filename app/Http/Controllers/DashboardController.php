<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pemesanan = Pemesanan::whereDate('tgl_pesanan', Carbon::today())->get()->count();
        $pengambilan = Pemesanan::whereDate('tgl_pengambilan', Carbon::today())->where('status_cuci', 'selesai')->get()->count();
        return view('home', compact('pemesanan', 'pengambilan'));
    }
}
