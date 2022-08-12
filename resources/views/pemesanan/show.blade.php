@extends('layouts.home')

@section('title', 'Register')

@section('content')
<div class="container m-5" style="min-height: calc(100vh - 202px)">
    <h2 class="mb-5">Nota Pemesanan</h2>

    <div class="row">
        <div class="col-md-6">
            <div class="row align-items-center mb-3">
                <div class="col-md-5 font-weight-bold">
                    No Pemensanan
                </div>
                <div class="col-md-4">
                    {{ $pemesanan->no_pemesanan }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="row align-items-center mb-3">
                <div class="col-md-5 font-weight-bold">
                    Jenis Cuci
                </div>
                <div class="col-md-4">
                    {{ $pemesanan->jenis_cuci->nama }}
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col-md-5 font-weight-bold">
                    Tanggal Pemesanan
                </div>
                <div class="col-md-4">
                    {{ $pemesanan->tgl_pesanan->format('d/m/Y') }}
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col-md-5 font-weight-bold">
                    Status Cuci
                </div>
                <div class="col-md-4 text-capitalize">
                    @if ($pemesanan->status_cuci == 'menunggu')
                        <span class="badge badge-warning">Menunggu</span>
                    @elseif ($pemesanan->status_cuci == 'diproses')
                        <span class="badge badge-info">Diperoses</span>
                    @else
                        <span class="badge badge-success">Selesai</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row align-items-center mb-3">
                <div class="col-md-5 font-weight-bold">
                    Jumlah
                </div>
                <div class="col-md-4">
                    {{ $pemesanan->jumlah }} {{ $pemesanan->jenis_cuci->satuan }}
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col-md-5 font-weight-bold">
                    Tanggal Kembali
                </div>
                <div class="col-md-4">
                    {{ $pemesanan->tgl_pengambilan->format('d/m/Y') }}
                </div>
            </div>
            <div class="row align-items-center mb-3">
                <div class="col-md-5 font-weight-bold">
                    Status Pembayaran
                </div>
                <div class="col-md-4">
                    {!! $pemesanan->status_pembayaran ? '<span class="badge badge-success">Lunas</span>' : '<span class="badge badge-warning">Belum Lunas</span>' !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <a href="{{ Auth::user()->peran == 'pelanggan' ? route('pelanggan.pemesanan') : route('pemesanan.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
