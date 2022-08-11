<?php

namespace App\Http\Controllers;

use App\Models\JenisCuci;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pelanggan.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('pelanggan.form');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pelanggan  $pelanggan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        //
    }

    public function pemesanan()
    {
        $pemesanans = Pemesanan::where('id_pelanggan', Auth::user()->id_user)->get();
        return view('pelanggan.data_pemesanan', compact('pemesanans'));
    }

    public function createPemesanan()
    {
        $jenis_cucis = JenisCuci::all();
        return view('pelanggan.form_pemesanan', compact('jenis_cucis'));
    }

}
