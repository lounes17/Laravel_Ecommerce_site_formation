<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $fillable = ['title','course_id','description','sequence'];

    public function courses (){
        return $this->belongsTo(course::class);
    }

    public function lessons (){
        return $this->hasMany(lessons::class)->orderBy("sequence");
    }
}
