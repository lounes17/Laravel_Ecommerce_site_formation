<?php

namespace App\Http\Controllers;

use App\Lessons;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LessonsController extends Controller
{
    //
    public function store(Request $request){
         $request->validate([
             'lesson_title'=>'required'

         ]);
         $sequence=DB::table('lessons')->where(['section_id'=>$request->sectionid])->max('sequence');
        if(is_null($sequence)){
            $sequence=1;
        }else{
            $sequence++;

        };
        Lessons::create([
            'title'=>$request->lesson_title,
            'description'=>$request->lesson_description,
            'is_preview'=>($request->has('ispreview') && $request->ispreview =='on')?true:false,
            'sequence'	=> $sequence,
            'section_id'=>$request->sectionid,
            'course_id'=>$request->courseid,
            'source'=>$request->lesson_source,
            'status'=>'1',
        ]);
        return redirect()->back();
        //TODO:status is string not integer

    }
    public function switchIndex(Request $request){
        $lessonID=$request->lesson;
        $newIndex=intval($request->index)+1;
        //return dd($request->section);
        $lesson= Lessons::find($lessonID);
        $oldLessonIndex=Lessons::where([ 'sequence'=>$newIndex,
        'section_id'=>$request->section,
        ])->first();
       // return dd($request->section);
        if ($oldLessonIndex) {
            $oldLessonIndex->sequence=$lesson->sequence;
            $oldLessonIndex->save();
        };
        $lesson->sequence=$newIndex;
        $lesson->save();
        return response(
           ['message'=>'switched index'],200
        );


    }
    public function delete(Request $request){
        Lessons::destroy($request->lesson);
        return back();
    }
}
