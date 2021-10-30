<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Address;



class UserProfileController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth']);
        //,'email_verfied'
    }
    public function show(){
        // return view('user.userProfile', ['user' => User::findOrFail($id)]);
        return view('users.userProfile')->with(['user'=>Auth::user()]);
     }
    public function updateAddress(Request $request){
        $address= new Address();

        if($request->street_number != null){
            $address->street_number=$request->street_number;
        }
        if($request->unit_number != null){
            $address->unit_number=$request->unit_number;
        }
        if($request->suburb != null){
            $address->suburb=$request->suburb;
        }
        if($request->city != null){
            $address->city=$request->city;
        }
        if($request->state != null){
            $address->state=$request->state;
        }
        if($request->post_code != null){
            $address->post_code=$request->post_code;
        }
        if($request->country != null){
            $address->country= $request->country;
        }
        $address->save();
        $user=Auth::user();
        if($request->addresses =="both"){
            $user->billing_address = $address->id;
           $user->shipping_address = $address->id;
        }
        $user->save();


        return redirect( route("profile"));
    }
}
