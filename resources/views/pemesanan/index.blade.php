@extends('layouts.app')

@section('title', 'Pemesanan')

@section('content')
<div class="container p-5" style="min-height: calc(100vh - 106px)">
    <h2>Pemesanan</h2>

    @if (Auth::user()->peran == 'manajer')
    <a href="{{route('pemesanan.print')}}" class="btn btn-primary mb-2" target="_blank">
        Cetak Laporan
    </a>
    @endif

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
                    <a href="{{ route('pemesanan.show', $pemesanan->no_pemesanan) }}" class="btn m-1 btn-warning text-light" data-toggle="tooltip" data-placement="top"  title="Nota"><i class="fa-solid fa-file-invoice"></i></a>
                    @if ($pemesanan->status_cuci == 'menunggu')
                    <a href="{{ route('pemesanan.edit', $pemesanan->no_pemesanan) }}" class="btn m-1 btn-success text-light" data-toggle="tooltip" title="Konfirmasi"><i class="fa-solid fa-handshake-simple"></i></i></a>
                    @endif
                    @if ($pemesanan->status_cuci == 'diproses' && ($pemesanan->tgl_pengambilan->isToday() || $pemesanan->tgl_pengambilan->isPast()))
                        @if ($pemesanan->status_pembayaran)
                        <a href="{{route('pemesanan.update.status', $pemesanan->no_pemesanan)}}" class="btn m-1 btn-success text-light btn-pengambilan" data-toggle="tooltip" title="Pengambilan"><i class="fa-solid fa-arrow-up"></i></i></a>
                        @else
                        <a href="{{route('pemesanan.edit', $pemesanan->no_pemesanan)}}" class="btn m-1 btn-success text-light" data-toggle="tooltip" title="Pengambilan"><i class="fa-solid fa-arrow-up"></i></i></a>
                        @endif
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

    $(document).on('click', ".btn-pengambilan", function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
            title: "Lakukan Pengambilan?",
            icon: "question",
            showCancelButton: true,
            confirmButtonText: "Iya",
            cancelButtonText: "Tidak",
            reverseButtons: true
        }).then(function (result) {
            if (result.value) {
                $.ajax({
                    url : url,
                    type : "POST",
                    data :{
                        '_method' : 'PUT',
                        '_token' : $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function (body) {
                        $('.overlay-layer').removeClass('d-none');
                    },
                    success: function (res) {
                        Swal.fire("Data Bershasil Disimpan!", "", "success");
                        location.href = "";
                    },
                    error:function (xhr) {
                        Swal.fire("Data ini tidak bisa simpan",  "warning");
                    }
                });
            }
        });
    });

</script>
@endpush
