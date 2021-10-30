<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function setlanguage(Request $request){
        $request->validate([
            'language' => 'required'
        ]);
        session()->put( 'locale', $request->language);

         return redirect()->back();

    }

}
