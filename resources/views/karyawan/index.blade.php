@extends('layouts.app')

@section('title', 'Karyawan')

@section('content')
<div class="container p-5" style="min-height: calc(100vh - 106px)">
    <h2>Karyawan</h2>

    <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-2">+ Tambah</a>

    <table class="table table-striped w-100 datatables">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nama</th>
            <th scope="col">Username</th>
            <th scope="col">Peran</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Tgl Lahir</th>
            <th scope="col">Karyawan Sejak</th>
            <th scope="col">Aksi</th>
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
                <td>{{ $item->karyawan?->tgl_lahir }}</td>
                <td>{{ $item->karyawan?->karyawan_sejak }}</td>
                <td>
                    <a href="{{ route('karyawan.edit', $item->id_user) }}" class="btn btn-warning text-light">Edit</a>
                    <a href="{{ route('karyawan.destroy', $item->id_user) }}" class="btn btn-danger btn-hapus">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>
@endsection

@push('scripts')
<script>
    @if (session('success'))
        Swal.fire('Sukses', '{{ session("success") }}', 'success')
    @endif
</script>
@endpush
