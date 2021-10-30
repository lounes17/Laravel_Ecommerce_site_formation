<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
      //  $this->middleware('verified');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {    $user=auth()->user();
        if($user->account_type=="professor"){
        return view('teacher\dashboardTeacher');
    }
        return view('studiant\dashboardStudiant');
    }
}
