@extends('layouts.dashboard')

@section('content')
<div class="dashboard-wrapper" >
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-sm-12">
                @yield('TeacherCourse-content')
            </div>
        </div>
    </div>

</div>

@endsection
