@extends('layouts.home')

@section('title', 'Register')

@section('content')
<div class="container m-5" style="min-height: calc(100vh - 202px)">
    <h2 class="mb-5">Profil</h2>
    <div class="row align-items-center mb-3">
        <div class="col-md-3 font-weight-bold">
            Username
        </div>
        <div class="col-md-4">
            {{ Auth::user()->username }}
        </div>
    </div>
    <div class="row align-items-center mb-3">
        <div class="col-md-3 font-weight-bold">
            Nama
        </div>
        <div class="col-md-4">
            {{ Auth::user()->nama }}
        </div>
    </div>
    <div class="row align-items-center mb-3">
        <div class="col-md-3 font-weight-bold">
            Jenis Kelamin
        </div>
        <div class="col-md-4">
            {{ Auth::user()->jenis_kelamin }}
        </div>
    </div>
    <div class="row align-items-center mb-3">
        <div class="col-md-3 font-weight-bold">
            No HP
        </div>
        <div class="col-md-4">
            {{ Auth::user()->pelanggan->no_hp }}
        </div>
    </div>
    <div class="row align-items-center mb-3">
        <div class="col-md-3 font-weight-bold">
            Alamat
        </div>
        <div class="col-md-4">
            {{ Auth::user()->pelanggan->alamat }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('pelanggan.edit', Auth::user()->id_user) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection
