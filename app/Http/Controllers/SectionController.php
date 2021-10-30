<?php

namespace App\Http\Controllers;

use App\Course;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SectionController extends Controller
{
    //
    public function store(Course $course,Request $request){
        $request->validate([
            'section_title'=>'required',
            'section_description'=>'required'
        ]);
        $course->section()->create([
            'title'=>$request->section_title,
            'description'=>$request->section_description,
        ]);
        return Redirect()->back();
    }
    public function switchIndex(Request $request){
        $sectionID=$request->section;
        $newIndex=intval($request->index)+1;
        $section= Section::find($sectionID);
        $oldsectionIndex=Section::where([ 'sequence'=>$newIndex,
        ])->first();
       // return dd($request->section);
        if ($oldsectionIndex) {
            $oldsectionIndex->sequence=$section->sequence;
            $oldsectionIndex->save();
        };
        $section->sequence=$newIndex;
        $section->save();
        return response(
           ['message'=>'switched index'],200
        );

    }
    public function delete(Request $request){
        $section=Section::find($request->section);
        $section->lessons()->delete();
        Section::destroy($request->section);
        return back();
    }
}
