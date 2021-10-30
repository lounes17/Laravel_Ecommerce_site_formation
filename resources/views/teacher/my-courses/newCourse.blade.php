@extends('teacher.dashboardTeacher')
@section('Teacher-content')
<div class="card pt-4">
    <div class="card-content">
        <div class="card-body">
            <form action="{{route('courses-store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if (!is_null($Course))
                    <input type="hidden" name="_method" value="put">
                    <input type="hidden" name="course_id" value="{{$Course->id}}">
                @endif
                <div class="form-group">
                    <label for="cours_title">Course title</label>
                    <input type="text" class="form-control" id="course_title" placeholder="Course title" name="course_title" value="{{!is_null($Course)? $Course->title : ""}}" required>
                </div>
                <div class="form-group">
                    <label for="cours_description">Course description</label>
                    <textarea class="form-control" id="course_description" rows="6" name="course_description" value="{{!is_null($Course)? $Course->description : ""}}" ></textarea>
                </div>
                <div class="from-group">
                    <label for="inputPassword5">Price</label>
                    <input type="number" id="price" class="form-control" aria-describedby="price" name="course_price" value="{{ !is_null($Course) ? $Course->price  :'0'}}" required >
                </div>
                <div class="form-group">
                    <label for="course_category">Course category</label>
                    <select class="js-example-basic-single col-12" id="course_category" name='course_category'>
                        <option value='' disabled selected>Select Course Category</option>
                        @foreach ($categories as $category)
                        <option {{( !is_null($Course) && $Course->category_id == $category->id) ? 'selected':''}} value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="from-group mt-4">
                    <div class="form-group">
                        <label for="image">Example Images input</label>
                        <input type="file" class="form-control-file" id="image" name="course_image" value="{{ !is_null($Course) ? $Course->image  :''}}" >
                    </div>
                </div>
                <div class="form-group">
                <button class="btn btn-primary" type="submit">{{is_null($Course)?"ADD NEW COURSE":"Update"}}</button>
                </div>
            </form>
            @if (!is_null($Course))
                <form action="{{route('courses-store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="course_id" value="{{$Course->id}}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>

            @endif

            <div>
                @foreach ($errors->all() as $error)
                    {{$error}} <br>
                @endforeach
            </div>


        </div>
    </div>
</div>
@endsection

