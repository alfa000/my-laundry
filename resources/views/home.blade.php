@extends('layouts.app')

@section('title', 'Dasboard')

@section('content')
<div class="container p-5">
    <h2>Dashboard</h2>
    <div class="row justify-content-center align-items-center p-0 m-0">
        <div class="col-md-6">
            <div class="card bg-primary w-100">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-money-bill text-white fa-2xl mr-2"></i>
                        <h5 class="text-white">
                            Pesanan <br>
                            <small>5</small>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="fa-solid fa-money-bill text-white fa-2xl mr-2"></i>
                        <h5 class="text-white py-2">
                            Diambil <br>
                            <small>5</small>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
