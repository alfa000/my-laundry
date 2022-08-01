@extends('layouts.home')

@section('title', 'Register')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: calc(100vh - 107px)">
        <div class="col-md-6 my-5">
            <div class="text-center mb-2">
                <img src="{{ asset('assets/img/logo.png') }}" width="100px" class="m-auto" alt="">
            </div>
            <h2 class="text-center mb-5">My Laundry</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row justify-content-between">
                    <label for="username" class="col-sm-2 col-form-label">{{ __('Username') }}</label>

                    <div class="col-md-9">
                        <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('id') }}" required autofocus>

                        @if ($errors->has('username'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row justify-content-between">
                    <label for="password" class="col-md-2 col-form-label">{{ __('Password') }}</label>

                    <div class="col-md-9">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row justify-content-between">
                    <label for="password_confirmation" class="col-md-2 col-form-label">{{ __('Password Confirmation') }}</label>

                    <div class="col-md-9">
                        <input id="password_confirmation" type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row justify-content-between">
                    <label for="nama" class="col-sm-2 col-form-label">{{ __('Nama') }}</label>

                    <div class="col-md-9">
                        <input id="nama" type="text" class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('id') }}" required autofocus>

                        @if ($errors->has('nama'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row justify-content-between">
                    <label for="jenis_kelamin" class="col-sm-2 col-form-label">{{ __('Jenis Kelamin') }}</label>

                    <div class="col-md-9">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="l" value="l">
                            <label class="form-check-label" for="l">
                              Laki-laki
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="p" value="p">
                            <label class="form-check-label" for="p">
                              Perempuan
                            </label>
                        </div>

                        @if ($errors->has('jenis_kelamin'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('jenis_kelamin') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row justify-content-between">
                    <label for="no_hp" class="col-sm-2 col-form-label">{{ __('No HP') }}</label>

                    <div class="col-md-9">
                        <input id="no_hp" type="text" class="form-control{{ $errors->has('no_hp') ? ' is-invalid' : '' }}" name="no_hp" value="{{ old('id') }}" required autofocus>

                        @if ($errors->has('no_hp'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('no_hp') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row justify-content-between">
                    <label for="alamat" class="col-sm-2 col-form-label">{{ __('Alamat') }}</label>

                    <div class="col-md-9">
                        <textarea name="alamat" id="alamat" cols="10" rows="3" class="form-control" required>{{ old('id') }}</textarea>

                        @if ($errors->has('alamat'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('alamat') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row justify-content-between">
                    <div class="col-md-8">
                        klik <a href="">login</a> jika sudah mempunyai akun
                    </div>
                    <div class="col-md-4 text-right">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Registrasi') }}
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
