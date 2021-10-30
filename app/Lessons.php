<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessons extends Model
{
    //
    protected $fillable = ['title','description','is_preview','section_id','course_id','status','source','sequence'];

    public function section (){
        return $this->belongsTo(section::class);
    }

    public function courses (){
        return $this->belongsTo(course::class);
    }

    public function attachementes (){
        return $this->hasMany(LessonsAttachment::class);
    }

}
