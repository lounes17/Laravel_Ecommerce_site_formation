@extends('layouts.dashboard')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center signin-card">
            <div class="col-md-6 col-sm-12">
                <div class="card pt-5 pb-5 text-center">
                    <i class="fas fa-graduation-cap logo-login mb-2 " ></i>
                    <h4 class="mt-4 pl-3">RECOVER PASSWORD</h4>
                    <p>THE WORLD'S LARGEST WEB DEVELOPER SITE</p>
                    <div class="d-flex justify-content-center mb-2" >
                        <div class="diveder"></div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}"class="auth-form" >
                            @csrf

                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('auccont.Email') }}" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-12 d-flex justify-content-center mt-4">
                                    <button type="submit" class="btn btn-lg login-btn">
                                        {{ __('Envoyer le code par e-mail') }}
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
