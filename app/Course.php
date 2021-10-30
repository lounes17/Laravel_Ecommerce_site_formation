<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Mime\Part\Multipart\RelatedPart;

class Course extends Model
{
    //
    protected $fillable = ['title','description','category_id','price','image'];

    public function authors (){
        return $this->belongsToMany(User::class,'course_user');
    }

    public function category (){
        return $this->belongsTo(CourseCategory::class);
    }
    public function tags (){
        return $this->belongsToMany(CourseTag::class,'course_tag');
    }
    public function section (){
        return $this->hasMany(section::class)->orderBy('sequence');
    }
    public function lessons (){
        return $this->hasMany(lessons::class);
    }





}
