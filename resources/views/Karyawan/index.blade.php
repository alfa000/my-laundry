@extends('layouts.app')

@section('title', 'Karyawan')

@section('content')
<div class="container p-5">
    <h2>Karyawan</h2>
    <div class="row">
        <div class="col-md-12 my-5">
            <table class="table w-100 table-striped">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Telepon</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>1</td>
                    <td>Alfa</td>
                    <td>081233123131</td>
                    <td>jl xxxxxx</td>
                    <td>
                        <a href="" class="btn btn-warning">Edit</a>
                        <a href="" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>1</td>
                    <td>Reval</td>
                    <td>081233123131</td>
                    <td>jl xxxxxx</td>
                    <td>
                        <a href="" class="btn btn-warning">Edit</a>
                        <a href="" class="btn btn-danger">Hapus</a>
                    </td>
                  </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
