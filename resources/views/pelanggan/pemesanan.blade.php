@extends('layouts.home')

@section('title', 'Karyawan')

@section('content')
<div class="container m-5" style="min-height: calc(100vh - 202px)">
    <h2>Pemesanan Pelanggan</h2>

    <a href="{{ route('pemesanan.create') }}" class="btn btn-primary mb-2">Lakukan Pemesanan Laundry</a>

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
            @foreach ($pemesanans as $pemesanan)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pemesanan->nama }}</td>
                <td>{{ $pemesanan->username }}</td>
                <td>{{ $pemesanan->peran }}</td>
                <td>{{ $pemesanan->jenis_kelamin == 'l' ? 'Laki-laki' : 'Perempuan'}}</td>
                <td>{{ $pemesanan->karyawan->tgl_lahir }}</td>
                <td>{{ $pemesanan->karyawan->karyawan_sejak }}</td>
                <td>
                    <a href="{{ route('karyawan.edit', $pemesanan->id_user) }}" class="btn btn-warning text-light">Edit</a>
                    <a href="{{ route('karyawan.edit', $pemesanan->id_user) }}" class="btn btn-danger">Hapus</a>
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
