@extends('layouts.app')

@section('title', 'Dasboard')

@section('content')
<div class="container p-5" style="min-height: calc(100vh - 106px)">
    <h2>Dashboard</h2>
    <div class="row justify-content-center align-items-center p-0 m-0">
        <div class="col-md-6">
            <div class="card" style="background: #3ba5fb !important">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-arrow-down text-white fa-2xl mr-3"></i>
                        <h5 class="text-white">
                            Pesanan Hari Ini <br>
                            <small>1</small>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="background: #3ba5fb !important">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-arrow-up text-white fa-2xl mr-3"></i>
                        <h5 class="text-white">
                            Pemabilan Hari Ini  <br>
                            <small>1</small>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
