<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Address;
use App\country;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth',
        ]);
        //,'email_verfied'
    }
    public function show(){

        return view('layouts.profile')->with(
           ['user'=>Auth()->user(),
              'is_teacher'=>(Auth()->user()->account_type=='professor'),
              'address'=>Auth()->user()->billingAdresses,
              'countries'=>country::all(),
            ])
        ;
    }
    public function updateSettings(Request $request){
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required'
        ]);
        $user=Auth()->user();
        $user->firstname=$request->first_name;
        $user->lastname=$request->last_name;
        $user->biography=$request->bio_graphie;
        $user->save();
        return redirect(route("profile"));
    }

    public function updateAddress(Request $request){
        $request->validate([
            'country'=>'required'
        ]);
         $user=Auth()->user();
         $address= (is_null($user->billingAdresses) ? new Address():$user->billingAdresses);
         $address->street_number=$request->street_number;
         $address->unit_number=$request->unit_number;
         $address->suburb=$request->suburb;
         $address->city=$request->city;
         $address->state=$request->state;
         $address->post_code=$request->post_code;
          $address->country=$request->country;
          $address->save();
          $user->billing_address=$address->id;
          $user->save();
          return redirect(route("profile"));
    }
}
