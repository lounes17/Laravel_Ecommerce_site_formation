<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseTag extends Model
{
    //
    protected $fillable = ['tag'];

    public function courses (){
        return $this->belongsToMany(CourseTag::class,'course_tag');
    }

}
