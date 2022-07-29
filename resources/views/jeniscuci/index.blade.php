@extends('layouts.app')

@section('title', 'jeniscuci')

@section('content')
<div class="container p-5">
    <h2>JenisCuci</h2>
    <a href="{{ route('jeniscuci.create') }}" class="btn btn-primary mb-2">+ Tambah</a>

    <table class="table table-striped w-100">
        <thead>
          <tr>
            <th scope="col">Kode Jenis Cuci</th>
            <th scope="col">Nama</th>
            <th scope="col">Harga</th>
            <th scope="col">Satuan</th>
            <th scope="col">Hari</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->kode_jenis_cuci }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->satuan }}</td>
                <td>{{ $item->hari }}</td>
            </tr>
            @endforeach
        </tbody>
      </table>

</div>
@endsection
