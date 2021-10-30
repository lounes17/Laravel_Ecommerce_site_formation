@extends('layouts.dashboard')
@section('content')
<div class="dashboard-wrapper" >
    <div class="container pt-4 pb-4 ">
           <div class="col-12 col-md-12 mb-2">
              @if (session("success"))
               <div class="alert alert-success text-center font-weight-bold " role="alert">
               <i class="fas fa-shopping-basket"></i> {{session('success')}}
                </div>
              @endif
          </div>
            <div class="col-sm-12 col-md-12 col-12 d-flex justify-content-center  ">
                @yield('product-content')
           </div>
    </div>
</div>

@endsection
