@extends('layouts.app')

@section('title', 'JenisCuci')

@section('content')
<div class="container p-5">
    <h2>Tambah Jenis Cuci</h2>

    <form action="{{ $model->exists ? route('jeniscuci.update', $model->kode_jenis_cuci) : route('jeniscuci.store') }}" method="POST">
        @csrf
        @method($model->exists ? 'PUT' : 'POST')

        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" id="nama" name="nama" value="{{ $model->nama }}" required>
        </div>

        <div class="form-group"Harga>
          <label for="harga">Harga</label>
          <input type="text" class="form-control" id="harga" name="harga" value="{{ $model->harga }}" required>
        </div>

        <div class="form-group">
          <label for="satuan">Satuan</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="satuan" @checked($model->satuan == 'kg') id="kg" value="kg">
            <label class="form-check-label" for="kg">
                KG
            </label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="satuan" @checked($model->satuan == 'pcs') id="pcs" value="pcs">
            <label class="form-check-label" for="pcs">
                PCS
            </label>
          </div>
        </div>

        <div class="form-group">
          <label for="hari">Hari</label>
          <input type="number" class="form-control" id="hari" name="hari" value="{{ $model->hari }}" required>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
