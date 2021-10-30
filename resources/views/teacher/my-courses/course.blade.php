@extends('teacher.dashboardTeacher')

@section('Teacher-content')
<div class="card p4">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
             <a href="{{route('newcourse')}}"class="btn btn-primary"  > Add New Courses</a>
            </div>
        </div>
    </div>
</div>
<div role="main" class='view-school mt-4 mb-4'>
 @if (count($Courses)>0)
 <div id="blocks" class="blocks-page blocks-page-course_sales_page ">
    <div class="course-block block liquid_html  odd-stripe" id="block-2834735">
            <div class="course-block block bundle_contents odd-stripe" id="block-2230257">
                <div class="container">
                    <div class="row">
                      @foreach ($Courses as $course)
                       <div class="col-xs-12 col-sm-6 col-md-4">

                        <!-- Bundle Course -->
                        <div class="course-listing bundle" data-course-url=https://www.udemy.com/course/ios-13-app-development-bootcamp/?referralCode=D3530B180A3ECABC6056">
                          <div class="row">
                            <div class="col-lg-12">
                              <!-- Course Image, Name & Subtitle (everyone) -->
                              <div class="course-box-image-container">
                                <img class="course-box-image" src="{{asset('/storage/'.$course->image)}}">
                              </div>
                              <div class="course-listing-title">
                                 {{$course->title}}
                              </div>

                              <!-- Subtitle (unenrolled users) -->
                              <div class="course-listing-subtitle">
                                 {!!$course->description!!}
                              </div>


                            </div>
                          </div>
                          <div class="row course-listing-extra-info col-xs-12">
                            <div class="col-xs-9">
                              <!-- Bundle Info (everyone) -->
                              <div class="d-flex bd-highlight mb-3">
                                <div class="p-1 bd-highlight"><a href="{{route("newcourse",['course'=>$course])}}" class="btn btn-primary">Course</a></div>
                                <div class="ml-auto p-1 bd-highlight"><a href="{{route("course-content",['course'=>$course])}}" class="btn btn-secondary">Content</a></div>
                              </div>

                              <!-- Author Image and Name (everyone) -->



                            </div>


                          </div>
                        </div>

                      </div>
                      @endforeach
                    </div>
                </div>
            </div>


    </div>

 </div>


 @endif

</div>


@endsection
