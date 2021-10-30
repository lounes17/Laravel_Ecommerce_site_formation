<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Http\Resources\UserLoginResource;
use Facade\FlareClient\Http\Response;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    private function credentials(Request $request){
        return $request->only('email','password');
        //key(['email','password'])

    }
    public function login(ApiLoginRequest $request){
        $userExist= Auth::attempt($this->credentials($request));
        if(!$userExist){
             return Response($contents='not found ', 404);
        }
        //$user = User::where([
        //    'email'=>$request->email
        //])->first();
        return Auth::viaRequest('custom-token', function ($request) {
            return User::where('token', $request->email)->first();
        });
        //return new UserLoginResource($user);


    }
}
