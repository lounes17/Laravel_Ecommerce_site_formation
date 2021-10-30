@extends('layouts.dashboard')

@section('content')
<div class="dashboard-wrapper" >
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <ul class="list-group">
                    <li class="list-group-item {{ (Illuminate\Support\Facades\Route::currentRouteName())=='home'? 'active' :'' }}"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="list-group-item {{ (Illuminate\Support\Facades\Route::currentRouteName())=='profile'? 'active' :'' }}"><a href="{{route('profile')}}">Profile</a></li>
                  </ul>
            </div>
            <div class="col-sm-12 col-md-8">
                @yield('Student-content')
            </div>
        </div>
    </div>

</div>

@endsection
