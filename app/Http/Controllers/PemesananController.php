<?php

namespace App\Http\Controllers;

use App\Models\JenisCuci;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemesanans = Pemesanan::all();
        return view('pemesanan.index', compact('pemesanans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis_cucis = JenisCuci::all();
        return view('pemesanan.form', compact('jenis_cucis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pemesanan::create([
            'id_pelanggan' => $request->id_pelanggan,
            'id_karyawan' => Auth::user()->id_user,
            'kode_jenis_cuci' => $request->kode_jenis_cuci,
            'jumlah' => $request->jumlah,
            'tgl_pesanan' => $request->tgl_pesanan,
            'tgl_pengambilan' => $request->tgl_pengambilan,
            'total_bayar' => $request->total_bayar,
            'keterangan' => $request->keterangan,
        ]);

        return redirect(route('pelanggan.pemesanan'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return view('pemesanan.show', compact('pemesanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $jenis_cucis = JenisCuci::all();
        return view('pemesanan.form', compact('pemesanan', 'jenis_cucis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Pemesanan::find($id)->update([
            'id_karyawan' => Auth::user()->id_user,
            'kode_jenis_cuci' => $request->kode_jenis_cuci,
            'jumlah' => $request->jumlah,
            'tgl_pesanan' => $request->tgl_pesanan,
            'tgl_pengambilan' => $request->tgl_pengambilan,
            'total_bayar' => $request->total_bayar,
            'status_cuci' => 'diproses',
            'keterangan' => $request->keterangan,
        ]);

        return redirect(route('pemesanan.index'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
