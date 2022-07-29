@extends('layouts.app')

@section('title', 'JenisCuci')

@section('content')
<div class="container p-5">
    <h2>Tambah Jenis Cuci</h2>

    <form action="{{ route('jeniscuci.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="kode_jenis_cuci">Kode Jenis Cuci</label>
            <input type="text" class="form-control" id="kode_jenis_cuci" name="kode_jenis_cuci" required>
          </div>

        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <div class="form-group"Harga>
          <label for="harga">Harga</label>
          <input type="text" class="form-control" id="harga" name="harga" required>
        </div>
        <div class="form-group">
          <label for="satuan">Satuan</label>
          <input type="text" class="form-control" id="satuan" name="satuan" required>
        </div>
        <div class="form-group">
          <label for="hari">Hari</label>
          <input type="text" class="form-control" id="hari" name="hari" required>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
