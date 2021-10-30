<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Mail\AdminNotifNewUserRegister;
use App\Mail\NewUserRegistered;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class RegisterController extends Controller
{
    public function register (UserRegisterRequest $request)
    {
        $user =User::create([
            'firstname' => $request -> firstname,
            'lastname' => $request -> lastname,
            'account_selection' => $request -> account_selection,
            'email' => $request -> email,
            'password' =>Hash::make($request -> password),
            'email_token'=>bin2hex(random_bytes(32)),
            'api_token'=>bin2hex(random_bytes(32)),
        ]);
        Mail::to($user)->queue(new NewUserRegistered($user));
        $admin=User::find(1);
        Mail::to($admin)->queue(new AdminNotifNewUserRegister($user));

        return new UserResource($user);

    }
}
