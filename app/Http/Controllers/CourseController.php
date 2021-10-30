<?php

namespace App\Http\Controllers;
use App\Course;
use App\User;
use Illuminate\Support\Facades\DB;
use App\CourseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use  RealRashid\SweetAlert\Facades\Alert;

use App\Cart as CartApp;




class CourseController extends Controller
{
    //
    public function index(){
        return view('teacher.my-courses.courses')->with([
            'Course'=>auth()->user()->Courses,
        ]);
    }
    public function show(Course $course=null){
        return view('teacher.my-courses.newCourse')->with([
            'Course'=>$course,
            'categories'=>CourseCategory::all(),
        ]);
    }

    public function store(Request $request){
         $request->validate([
            "course_title"=>"required",
            "course_description"=>"required",
            "course_price"=>"required",
            "course_category"=>"required",
            "course_image"=>"required | mimes:jpeg,Gif,png,PNG ",
         ]);
         $course= new Course();
         $course->title=$request->course_title;
         $course->description=$request->course_description;
         $course->price=$request->course_price;
         $course->category_id=$request->course_category;
         $course->user_id = auth()->id();

         if($request->hasFile('course_image')){
            $path = $request->file('course_image')->store('public');
            $course->image=$path;
            $course->save();
            //$request->course_image->move(public_path("public"),$request->course_image);

         }
        // return Redirect(route('teacher.my-courses.newCourse'));
        //DB::insert('insert into course_user (course_id, user_id) values (?, ?)', [$course->id, auth()->id]);
        DB::table('course_user')->updateOrInsert([
            'course_id'=>$course->id,
            'user_id'=>auth()->id(),
        ]);
        return redirect(route('course'));
    }
    public function update(Request $request){
        $request->validate([
            'course_id'=>'required'
        ]);
        $course=Course::find($request->course_id);
         $course->title=$request->course_title;
         $course->description=$request->course_description;
         $course->price=$request->course_price;
         $course->category_id=$request->course_category;
         $course->user_id = auth()->id();

         if($request->hasFile('course_image')){
            $path = $request->file('course_image')->store('public');
            $course->image=$path;
         }
         $course->save();
         return redirect(route('course'));
    }
    public function delete(Request $request){
        $request->validate([
            'course_id'=>'required'
        ]);
        DB::table('course_user')->where([
            'course_id'=>$request->course_id,
            'user_id'=>auth()->id(),
        ])->delete();
        Course::destroy($request->course_id);
        return redirect(route('course'));

    }

    public function courseContent(Course $course){
        return view('teacher.my-courses.course-content')->with([
            'course'=>$course,
        ]);
    }
    public function moreCourse(){
        if (session('success')) {
            toast(session('success'),'success');

        }


        return view('layouts.product.product-content')->with([
            'Course'=>Course::all(),
        ]);
    }
    public function oneCourse(Course $course){
        //$Course=Course::where(['id'=>$course,
        //])->first();
        $Course=Course::find($course);
        //return dd($Course);
        return view('layouts.product.one-course')->with([
            'Course'=>$Course,

        ]);

    }
    public function checkout($amount){
        return view('layouts.product.checkout')->with(['amount'=>$amount]);
    }
    public function charge(Request $request){
        $charge= Stripe::charges()->create([
            'currency'=>"USD",
            'source'=>$request->stripeToken,
            'amount'=>$request->amount,
            "description"=>'Test from laravel'
        ]);
        $chargeId=$charge['id'];
        if ($chargeId) {
            $order=auth()->User()->orders()->create([
                'cart'=>serialize(session()->get('cart'))
            ]);
            session()->forget('cart');
            return redirect()->route("more-course")->with('success','Payement was done Thanks');
        } else {
            # code...
            redirect()->back();
        }

    }
    public function deleteProduct(Course $course){
        $cart=new CartApp(session()->get('cart'));
        $cart->remove($course->id);
        if($cart->totalQty<=0){
            session()->forget('cart');
        }else{
            session()->put('cart',$cart);
        }
        return redirect()->route("carte.index")->with('success','Product Course was remove');

    }
    public function updateProduct(Request $request,Course $course){
        $request->validate([
            "qty"=>"required|numeric"
        ]);

        $cart=new CartApp(session()->get('cart'));
        $cart->updateQty($course->id,$request->qty);
        session()->put('cart',$cart);
        return redirect()->route("carte.index")->with('success','Product Course was change');

    }

}
