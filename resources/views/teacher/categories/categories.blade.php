@extends('teacher.dashboardTeacher')

@section('Teacher-content')
<div class="card p-4">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
               <form action="{{route('courseCategories')}}" method="post">
                   @csrf
                  <div class="form-group">
                    <label for="category_name">Category Name</label>
                    <input type="text" class="form-control" id="category_name" aria-describedby="emailHelp" name="category_name" required>
                    <small id="category_name" class="form-text text-muted">Please entre the category name</small>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">ADD CATEGORY</button>

                  </div>
                  @if (session()->has('message'))
                  <div class="form-group">
                    <div class="alert alert-danger" role="alert">
                        {{session()->get('message')}}
                    </div>

                  </div>

                  @endif

               </form>
            </div>
        </div>
    </div>
</div>
<div class="card p-4 mt-4">
    <div class="card-body">
        <div class="row">
            <table class="table ">
                <thead class="bg-dark color-light">
                  <tr>
                    <th style="color: white !important">Catogeries</th>
                    <th style="color: white !important">Update</th>
                    <th style="color: white !important">Delete</th>


                  </tr>
                </thead>
                <tbody>
                    @foreach ($categorie as $category)
                        <tr>
                              <form action="{{route('courseCategories')}}" method="post">
                                 <td>
                                    <div class="form-group">
                                        @csrf
                                        <input type="hidden" name="_method"  value="put">
                                        <input type="hidden" name="category_id" value="{{$category->id}}">
                                        <input type="text" class="form-control" value="{{$category->category}}" name="category_name_edite">
                                    </div>
                                 </td>
                                 <td>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                 </td>
                              </form>
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" >
                                    delete
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@foreach ($categorie as $category)
<form action="{{route('courseCategories')}}" method="post">
    @csrf
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Deleting Categories</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <div class="modal-body">
           ... Are you sure delete category
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           <input type="hidden" name="_method"  value="delete">
           <input type="hidden" name="category_id" value="{{$category->id}}">
           <button type="submit" class="btn btn-danger">DELETE CATOGERY</button>

       </div>
     </div>
 </form>
@endforeach


@endsection
