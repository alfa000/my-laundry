<?php

namespace App\Http\Controllers;

use App\Models\JenisCuci;
use App\Models\Pelanggan;
use App\Models\Pemesanan;
use App\Models\User;
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
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
            'username' => $request->username,
            'jenis_kelamin' => $request->jenis_kelamin,
        ];

        if ($request->password) {
            $data['password'] =  bcrypt($request->password);
        }

        User::where('id_user', $id)->update($data);

        Pelanggan::where('id_user', $id)->update([
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect(route('pelanggan.index'))->with('success', 'Data Berhasil Disimpan');
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
