<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index(){
        return view('welcome')->with([
           // $courses = DB::table('courses')->get(),
           $courses=Course::all()->take(4),
            'Courses'=>$courses,
        ]);
    }
}
