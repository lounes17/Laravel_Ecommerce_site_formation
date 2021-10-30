@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper" >
    <div class="container">
        <div class="row justify-content-center signin-card ">
            <div class="col-md-6 col-sm-12">
                <div class="card pt-5 pb-5 text-center">
                    <i class="fas fa-graduation-cap logo-login mb-2 " ></i>
                    <h4 class="mt-4 pl-3">SIGN IN</h4>
                    <p>THE WORLD'S LARGEST WEB DEVELOPER SITE</p>
                    <div class="d-flex justify-content-center mb-2" >
                        <div class="diveder"></div>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}" class="auth-form" >
                            @csrf

                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" placeholder="{{ __('auccont.Firstname') }}" autofocus>

                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">

                                <div class="col-12">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" placeholder="{{ __('auccont.Lastname') }}"autofocus>

                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('auccont.Email') }}">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">

                                <div class="col-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"placeholder="{{ __('auccont.Password') }}" >

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('auccont.ConfirmPassword') }}">
                                </div>
                            </div>

                            <div class="form-group row ">
                                <div class="col-12" >
                                    <select name="account_selection" id="account_selection" class="col-12 col-form-label text-md-right">
                                        <option value="etudiant" selected>{{__('auccont.Studiant')}}</option>
                                        <option value="professor" >{{__('auccont.Techear')}}</option>
                                    </select>
                                </div>
                            </div>




                            <div class="form-group row mb-0">
                                <div class="col-12 d-flex justify-content-center mt-4">
                                    <button type="submit" class="btn btn-lg login-btn">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                                <div class="col-12  d-flex justify-content-center ">
                                    <p class="mt-4"> Already have an account? <a href="{{ route('login') }}">Sign Up</a></p>
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
