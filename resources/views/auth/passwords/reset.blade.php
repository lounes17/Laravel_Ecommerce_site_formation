@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center signin-card">
            <div class="col-md-6 col-sm-12 text-center ">
                <div class="card pt-5 pb-5">
                    <div class="card pt-5 pb-5">
                        <i class="fas fa-graduation-cap logo-login mb-2 " ></i>
                        <h4 class="mt-4 pl-3">CHANGE PASSWORD</h4>
                        <p>THE WORLD'S LARGEST WEB DEVELOPER SITE</p>
                        <div class="d-flex justify-content-center mb-2" >
                            <div class="diveder"></div>
                        </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}" class="auth-form">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row">

                                <div class="col-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"placeholder="{{ __('auccont.NewPassword') }}" >

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"placeholder="{{ __('auccont.ConfirmPassword') }}" >
                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-4">
                                <div class="col-12 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-lg login-btn">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.newsletter')
@endsection
