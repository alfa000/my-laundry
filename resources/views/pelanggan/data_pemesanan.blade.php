@extends('layouts.home')

@section('title', 'Karyawan')

@section('content')
<div class="container p-5" style="min-height: calc(100vh - 106px)">
    <h2>Pemesanan</h2>

    <a href="{{ route('pelanggan.pemesanan.create') }}" class="btn btn-primary mb-2">
        <i class="fa-solid fa-basket-shopping"></i> Pesan
    </a>

    <table class="table table-striped w-100 datatables">
        <thead>
          <tr>
            <th scope="col">Id</th>
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
                <td>{{ $pemesanan->jenis_cuci->nama }}</td>
                <td>{{ $pemesanan->jumlah }}</td>
                <td>{{ $pemesanan->tgl_pesanan->format('d/m/Y') }}</td>
                <td>{{ $pemesanan->tgl_pengambilan->format('d/m/Y') }}</td>
                <td class="text-capitalize">
                    @if ($pemesanan->status_cuci == 'menunggu')
                        <span class="badge badge-warning">Menunggu</span>
                    @elseif ($pemesanan->status_cuci == 'diproses')
                        <span class="badge badge-info">Diperoses</span>
                    @else
                        <span class="badge badge-success">Selesai</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('pemesanan.show', $pemesanan->no_pemesanan) }}" data-toggle="tooltip" class="btn btn-warning text-light" title="Nota"><i class="fa-solid fa-file-invoice"></i></a>
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
