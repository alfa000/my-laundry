@extends('layouts.app')

@section('title', 'Karaywan')

@section('content')
<div class="container p-5">
    <h2>Tambah Karyawan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ $model->exists ? route('karyawan.update', $model->id_user) : route('karyawan.store') }}" method="POST">
        @csrf
        @method($model->exists ? 'PUT' : '')

        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" required value="{{ $model->nama }}">
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" class="form-control" id="username" name="username" required value="{{ $model->username }}">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" {{!$model->exists ? 'required' : ''}}>
        </div>
        <div class="form-group">
          <label for="peran">Peran</label>
          <select name="peran" id="peran" class="form-control" required>
            <option value="">-</option>
            <option value="kasir" @selected($model->peran == 'kasir')>Kasir</option>
            <option value="manajer" @selected($model->peran == 'manajer')>Manajer</option>
          </select>
        </div>
        <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="l" value="l" @checked($model->jenis_kelamin == 'l')>
                <label class="form-check-label" for="l">
                Laki-laki
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="p" value="p" @checked($model->jenis_kelamin == 'p')>
                <label class="form-check-label" for="p">
                Perempuan
                </label>
            </div>
        </div>
        <div class="form-group">
          <label for="tgl_lahir">Tgl Lahir</label>
          <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required value="{{ $model->karyawan?->tgl_lahir }}">
        </div>
        <div class="form-group">
          <label for="karyawan_sejak">Karyawan Sejak</label>
          <input type="date" class="form-control" id="karyawan_sejak" name="karyawan_sejak" required value="{{ $model->karyawan?->karyawan_sejak }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
