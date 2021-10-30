@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  {{$user->formattedName() }} Address

                </div>
                <div class="card-body">
                <form action="{{route('profile-address')}}" method="post" >
                  @csrf
                  @include('users.form')
                </form>

                </div>
            </div>
        </div>

    </div>
    <br>
    <div class="row">
       <div class="col-md-12">
           <div class="card">
               <div class="card-header">
                 {{$user->formattedName() }} Avatar

               </div>
               <div class="card-body">

               </div>
           </div>
       </div>

   </div>
</div>

 @endsection
