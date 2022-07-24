@extends('layouts.app')

@section('title', 'Karaywan')

@section('content')
<div class="container p-5">
    <h2>Karyawan</h2>

    <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-2">+ Tambah</a>

    <table class="table table-striped w-100">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Peran</th>
            <th scope="col">Jenis Kelamin</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->peran }}</td>
                <td>{{ $item->jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan'}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection
