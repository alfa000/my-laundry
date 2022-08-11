@extends('layouts.app')

@section('title', 'Pemesanan')

@section('content')
<div class="container p-5" style="min-height: calc(100vh - 106px)">
    <h2>Pemesanan</h2>

    <table class="table table-striped w-100 datatables">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Pelanggan</th>
            <th scope="col">Jenis Cuci</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Tgl Pemesanan</th>
            <th scope="col">Tgl Pengambilan</th>
            <th scope="col">Status Cuci</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pemesanans as $pemesanan)
            <tr>
                <td>{{ $pemesanan->no_pemesanan }}</td>
                <td>{{ $pemesanan->pelanggan->nama }}</td>
                <td>{{ $pemesanan->jenis_cuci->nama }}</td>
                <td>{{ $pemesanan->jumlah }}</td>
                <td>{{ $pemesanan->tgl_pesanan->format('d-m-Y') }}</td>
                <td>{{ $pemesanan->tgl_pengambilan->format('d-m-Y') }}</td>
                <td class="text-uppercase">{{ $pemesanan->status_cuci }}</td>
                <td>
                    <a href="{{ route('pemesanan.show', $pemesanan->no_pemesanan) }}" class="btn m-1 btn-warning text-light" title="Nota"><i class="fa-solid fa-file-invoice"></i></a>
                    @if ($pemesanan->status_cuci == 'menunggu')
                    <a href="{{ route('pemesanan.edit', $pemesanan->no_pemesanan) }}" class="btn m-1 btn-success text-light" title="Konfirmasi"><i class="fa-solid fa-handshake-simple"></i></i></a>
                    @endif
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
