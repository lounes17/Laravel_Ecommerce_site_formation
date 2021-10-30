<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth']);
        //,'email_verfied'
    }
    public function index(){
        return view('teacher.my-courses.course')->with([
            'Courses'=>auth()->user()->Courses,
        ]);
    }
}
