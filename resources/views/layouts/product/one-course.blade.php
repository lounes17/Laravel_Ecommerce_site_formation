@extends('layouts.product.more-courses')
@section('product-content')
    @foreach ($Course as $course)
    <div class=" mb-4 col-md-10">
        <div class="card mr-0">
            <div class="card-body ">
              <img src="{{asset('/storage/'.$course->image)}}" class="card-img-top" alt="..." >
              <h5 class="card-title font-weight-bold mt-1">{{ $course->title}}</h5>
              <small class="text-muted">{{ $course->created_at->format('Y/m/d')}}</small>
              <p class="text-muted font-weight-bold ">{{ $course->description}}</p>
            <form action="{{route('carte.store')}}" method="post">
                  @csrf
                  <input type="hidden" name='id' value="{{$course->id}}">
                <button type="submit" class="btn btn-danger font-weight-bold mt-4 mb-4"><i class="fas fa-shopping-cart"></i> Enroll in Course for {{ $course->price}} $</button>
            </form>

            </div>
            <div class="font-weight-bold mb-2 d-flex justify-content-center">
                <h3>Course Curriculum</h3>

            </div>
            <div class="mr-1 ml-1 mb-1">
                <ul class="list-group" >
                    @foreach ($course->section as $section)
                       <li class="list-group-item list-group-item-secondary font-weight-bold ">SECTION {{$section->sequence}}:{{$section->title}}
                           @foreach ($section->lessons as $lesson)

                            <li class="list-group-item list-group-item-success  font-italic "><a href=""><div class="d-flex justify-content-between"><div class="align-content-start"><i class="fab fa-youtube mr-1"></i>{{$lesson->title}}</div><button type="button" class="btn btn-danger ">Start</button></div>
                            </a></li>
                           @endforeach

                       </li>
                    @endforeach
                   </ul>
            </div>



        </div>

    </div>

    @endforeach



@endsection
