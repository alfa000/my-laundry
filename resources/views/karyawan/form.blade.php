@extends('layouts.app')

@section('title', 'Karaywan')

@section('content')
<div class="container p-5">
    <h2>Tambah Karyawan</h2>

    <form action="{{ route('karyawan.store') }}" method="POST">
        @csrf

        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="peran">Peran</label>
          <select name="peran" id="peran" class="form-control" required>
            <option value="">-</option>
            <option value="kasir">Kasir</option>
            <option value="manajer">Manajer</option>
          </select>
        </div>
        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="l" value="l">
                <label class="form-check-label" for="l">
                Laki-laki
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="p" value="p">
                <label class="form-check-label" for="p">
                Perempuan
                </label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
