@extends('layouts.home')

@section('title', 'Register')

@section('content')
<div class="container m-5" style="min-height: calc(100vh - 202px)">
    <h2 class="mb-5">Nota Pembayaran</h2>
    <div class="row align-items-center mb-3">
        <div class="col-md-3 font-weight-bold">
            No Pemensanan
        </div>
        <div class="col-md-4">
            {{ $pemesanan->no_pemesanan }}
        </div>
    </div>
    <div class="row align-items-center mb-3">
        <div class="col-md-3 font-weight-bold">
            Jenis Cuci
        </div>
        <div class="col-md-4">
            {{ $pemesanan->jenis_cuci->nama }}
        </div>
    </div>
    <div class="row align-items-center mb-3">
        <div class="col-md-3 font-weight-bold">
            Jumlah
        </div>
        <div class="col-md-4">
            {{ $pemesanan->jumlah }}
        </div>
    </div>
    <div class="row align-items-center mb-3">
        <div class="col-md-3 font-weight-bold">
            Tanggal Pemesanan
        </div>
        <div class="col-md-4">
            {{ $pemesanan->tgl_pesanan->format('d/m/Y') }}
        </div>
    </div>
    <div class="row align-items-center mb-3">
        <div class="col-md-3 font-weight-bold">
            Tanggal Kembali
        </div>
        <div class="col-md-4">
            {{ $pemesanan->tgl_pengambilan->format('d/m/Y') }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <a href="{{ route('pelanggan.pemesanan') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>
@endsection
