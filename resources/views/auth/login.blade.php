@extends('layouts.auth')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: calc(100vh - 107px)">
        <div class="col-md-6">
            <div class="text-center mb-2">
                <img src="{{ asset('assets/img/logo.png') }}" width="100px" class="m-auto" alt="">
            </div>
            <h2 class="text-center mb-5">My Laundry</h2>

            <form method="POST" action="{{ route('login') }}">
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
                    <div class="col-md-8">
                        klik <a href="{{ route('register') }}">register</a> jika belum mempunyai akun
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
