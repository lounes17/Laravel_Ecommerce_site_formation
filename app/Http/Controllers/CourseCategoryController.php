<?php

namespace App\Http\Controllers;

use App\CourseCategory;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class CourseCategoryController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth','is_teacher']);
        //,'email_verfied'
    }
    public function index(){
        return view('teacher.categories.categories')->with([
            //'categorie'=>auth()->user()->categories
            'categorie'=>CourseCategory::all()

        ]);
    }
    public function store(Request $request){
        $request->validate([
            'category_name'=>'required'
        ]);
        session()->remove('message');
        if($this->existe($request->category_name)){
            $request->session()->flash('message','Category Already existe');
            return redirect(route('courseCategories'));

        }
        $category= new CourseCategory();
        $category->category = strtoupper($request->category_name);
        //$category->user_id = auth()->id();
        $category->save();
        return redirect(route('courseCategories'));
    }
    public function edit(Request $request){
        $request->validate([
            'category_name_edite'=>'required',
            'category_id'=>'required',
        ]);
        if($this->existe($request->category_name_edite)){
            $request->session()->flash('message','Category Already existe');
            return redirect(route('courseCategories'));

        }
        $category=CourseCategory::find($request->category_id);
        $category->category= strtoupper($request->category_name_edite);
        $category->save();
        return redirect(route('courseCategories'));
    }
    public function delete(Request $request){
        $request->validate([
            'category_id'=>'required'
        ]);
        CourseCategory::destroy($request->category_id);
        return redirect(route('courseCategories'));
    }
    private function existe(String $category_name){
        $category=CourseCategory::where([
            'category'=>strtoupper($category_name)
        ])->first();
        if($category){
            return true;
        }else{
            return false;
        }

    }
}
