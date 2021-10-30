@extends('layouts.product.more-courses')
@section('product-content')

<div class="row row-cols-1 row-cols-md-3 mb-2 ">
    @foreach ($Course as $course)
    <div class="col mb-4">
        <div class="card">
            <img src="{{asset('/storage/'.$course->image)}}" class="card-img-top" alt="..." width="200" height="250" >
            <div class="card-body">
              <h5 class="card-title font-weight-bold ">{{ $course->title}}</h5>
              <small class="text-muted">{{ $course->created_at->format('Y/m/d')}}</small>
              <p class="text-muted font-weight-bold ">{{ $course->description}}</p>
              <p class="text-success font-weight-bold ">{{ $course->price}} $</p>
            </div>
            <div class="card-footer">
            <a href="{{route('one-course',$course->id)}}" class="btn btn-outline-primary">View Course</a>
            </div>
        </div>

    </div>

    @endforeach

</div>

@endsection
