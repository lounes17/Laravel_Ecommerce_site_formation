@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper" >
    <div class="container">
        <div class="row justify-content-center signin-card">
            <div class="col-md-6 col-sm-12 text-center ">
                <div class="card pt-5 pb-5">
                    <i class="fas fa-graduation-cap logo-login mb-2 " ></i>
                    <h4 class="mt-4 pl-3">SIGN UP</h4>
                    <p>THE WORLD'S LARGEST WEB DEVELOPER SITE</p>
                    <div class="d-flex justify-content-center mb-2" >
                        <div class="diveder"></div>
                    </div>


                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }} " class="auth-form">
                            @csrf

                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('auccont.Email') }}">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"placeholder="{{ __('auccont.Password') }}" >

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('auccont.RememberMe') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 d-flex flex-row-reverse bd-highlight ">
                                    @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('auccont.ForgotYourPassword?') }}
                                            </a>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-12 d-flex justify-content-center ">
                                    <button type="submit" class="btn btn-lg login-btn ">
                                        {{ __('auccont.Login') }}
                                    </button>
                                </div>
                                <div class="col-12  d-flex justify-content-center ">
                                    <p class="mt-4"> Dont have an account? <a href="{{ route('register') }}">Sign In</a></p>
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

