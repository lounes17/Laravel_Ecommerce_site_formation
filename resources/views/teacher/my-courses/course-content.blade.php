@extends('layouts\courseContent')
@section('TeacherCourse-content')
<div class="container">

            <div class="card m-2 col-12 col-md-12 pr-2 d-flex justify-content-center ">
              <div class="card-body d-flex justify-content-center ">
                    <a href="#" class="btn btn-primary col-12 col-md-12" data-toggle="modal" data-target="#newsection" >Add New section</a>
              </div>
            </div>

            <div class="col-sm-12 col-md-12 d-flex justify-content-center font-italic ">
                <h3>CONTENT</h3>
            </div>

        </div>
        @if (count($course->section)>0)

        <div class="row mt-4 col-12 col-md-12 d-flex justify-content-center ">
            <div class="pt-3 col-12 col-md-12">
                    <div class="col-md-12 ">
                        <ul class="section-sortable section-ul flex-column d-flex justify-content-center col-12 col-md-12   ">
                            @foreach ($course->section as $section)
                            <li class="ui-state-default col-12 mt-4  " data-section='{{$section->id}}'  >
                                <div class="sectiontitle">SECTION {{$section->sequence}}: {{$section->title}}</div>
                                <div class="d-flex justify-content-between mb-2 ">
                                    <a href="#" class="btn btn-success addsectionbtn mr-4"data-toggle="modal" data-target="#newlesson" data-section="{{$section->id}}" >Add New lesson</a>
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="btn btn-info mr-1"data-toggle="modal" data-target="#newsection" data-section-="{{$section->id}}" >Edit Section</a>
                                        <a href="#" class="btn btn-danger  deletesectionbtn"data-toggle="modal" data-target="#delete-section" data-section_delete="{{$section->id}}" >Delete section</a>
                                    </div>

                                </div>
                                @if (count($section->lessons)>0)
                                 @php
                                     $section->lessons->sortBy("sequence")
                                 @endphp
                                 <ul class="lesson-sortable lessons-ul col-12 col-md-12  ">
                                      @foreach ($section->lessons as $lesson)
                                         <li class="ui-state-default" data-lesson='{{$lesson->id}}' data-section='{{$section->id}} '>
                                            <div class="d-flex justify-content-between">
                                                <div class="alert alert-light  col-12 d-flex justify-content-between" role="alert"  >
                                                    <a href="" class="col-12 col-md-12" ><h6>{{$lesson->title}}</h6></a>
                                                    <i class="fas fa-align-justify"></i>
                                             </div>
                                               <a href="#" class="mt-4 ml-1 font-weight-normal text-danger lesson-delete-class" data-target="#delete-lesson" data-toggle="modal"  data-delete_lesson_id="{{$lesson->id}}" ><i class="far fa-window-close"></i></a>
                                            </div>
                                         </li>
                                     @endforeach
                                 </ul>
                              @endif
                           </li>

                            @endforeach
                        </ul>
                    </div>
            </div>
        </div>
        @endif






          <!-- Modal -->
          <div class="modal fade" id="newsection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">NEW SECTION</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              <form action="{{route('new-section',['course'=>$course])}}" method="post">
                    @csrf
                    <div class="container">
                        <div class="form-group">
                            <label for="section_title">Section Title</label>
                            <input type="text" class="form-control" id="section_title" name="section_title">
                            <small id="section-title" class="form-text text-muted">Add Title </small>
                        </div>
                        <div class="form-group">
                            <label for="section_title">Section sequence</label>
                            <input type="number" class="form-control" id="section_sequence" name="section_sequence">
                            <small id="section_sequence" class="form-text text-muted">Add Sequence </small>
                        </div>
                        <div class="form-group">
                            <label for="section_description">Description</label>
                            <textarea class="form-control" id="section_description" name="section_description" rows="3"></textarea>
                            <small id="section-description" class="form-text text-muted">Add Description</small>
                        </div>
                    </div>

                   <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-primary">ADD SECTION</button>
                   </div>
              </form>
                <div>
                    @foreach ($errors->all() as $error)
                        {{$error}} <br>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="newlesson" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">NEW LESSON</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
            <form action="{{route('lessons')}}" method="post">
                <input type="hidden" name='courseid' value="{{$course->id}}">
                <input type="hidden" name='sectionid' id="section_id">

                    @csrf
                    <div class="form-group form-check ml-2 mt-2">
                        <input type="checkbox" class="form-check-input" id="ispreview" name="ispreview">
                        <label class="form-check-label" for="ispreview">is preview </label>
                    </div>
                    <div class="container">
                        <div class="form-group">
                            <label for="lesson_title">Lesson Title</label>
                            <input type="text" class="form-control" id="lesson_title" name="lesson_title">
                            <small id="lesson-title" class="form-text text-muted">Lesson Title </small>
                        </div>
                        <div class="form-group">
                            <label for="lesson_description">Description</label>
                            <textarea class="form-control" id="lesson_description" name="lesson_description" rows="5"></textarea>
                            <small id="lesson-description" class="form-text text-muted">Add Description</small>

                        </div>
                        <div class="form-group">
                            <label for="lesson_source">source</label>
                            <textarea class="form-control" id="lesson_source" name="lesson_source" rows="5"></textarea>
                            <small id="lesson-source" class="form-text text-muted">Add source</small>

                        </div>

                    </div>

                   <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                        <button type="submit" class="btn btn-primary">ADD LESSON</button>
                   </div>
              </form>
                <div>
                    @foreach ($errors->all() as $error)
                        {{$error}} <br>
                    @endforeach
                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="delete-lesson" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        Are sure delete lesson !
                      </div>
                </div>
                <div class="modal-footer">
                    <form action="{{route('delete-lesson')}}" method="post">
                        <div class="form-group">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="lesson" id="lesson_id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </div>
                    </form>

                </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="delete-section" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger" role="alert">
                        Are sure delete section !
                      </div>
                </div>
                <div class="modal-footer">
                    <form action="{{route('delete-section')}}" method="post">
                        <div class="form-group">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="section" id="section_delete_id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-danger">Yes</button>
                        </div>
                    </form>

                </div>
              </div>
            </div>
          </div>
    </div>

@endsection
