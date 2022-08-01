<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;



use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::whereIn('peran', ['manajer', 'kasir'])->with('karyawan')->get();
        return view('karyawan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new User();
        return view('karyawan.form', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'username' => 'unique:users,username',
            'password' => 'required',
            'peran' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'karyawan_sejak' => 'required',
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'password' => $request->password,
            'peran' => $request->peran,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        $karyawan = Karyawan::create([
            'tgl_lahir' => $request->tgl_lahir,
            'karyawan_sejak' => $request->karyawan_sejak,
            'id_user' => $user->id_user,
        ]);

        return redirect(route('karyawan.index'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = User::with('karyawan')->findOrFail($id);
        return view('karyawan.form', compact('model'));
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
        $this->validate($request, [
            'nama' => 'required',
            'username' => "unique:users,username,$id,id_user",
            'peran' => 'required',
            'jenis_kelamin' => 'required',
            'tgl_lahir' => 'required',
            'karyawan_sejak' => 'required',
        ]);

        $data = [
            'nama' => $request->nama,
            'username' => $request->username,
            'peran' => $request->peran,
            'jenis_kelamin' => $request->jenis_kelamin,
        ];

        if ($request->password) {
            $data['password'] =  bcrypt($request->password);
        }

        User::where('id_user', $id)->update($data);

        Karyawan::where('id_user', $id)->update([
            'tgl_lahir' => $request->tgl_lahir,
            'karyawan_sejak' => $request->karyawan_sejak,
        ]);

        return redirect(route('karyawan.index'))->with('success', 'Data Berhasil Disimpan');
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
