<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'email', 'password','account_type',
        'email_verified_at','api_token','email_token',
        'billing_address','shipping_address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified' => 'true',
    ];
    public function orders(){
        return $this->HasMany('App\Order');
    }

    public function formattedName(){
        return $this->firstname." ".$this->lastname;
    }
    public function billingAdresses(){
        return $this->hasOne(Address::class,'id','billing_address');
    }
    public function shippingAdresses(){
        return $this->hasOne(Address::class,'id','shipping_address');

    }
    public function categories (){
        return $this->hasMany(CourseCategory::class);
    }
    public function courses (){
        return $this->belongsToMany(Course::class,'course_user');
    }

}
