<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    public $fillable = ['street_number','unit_number','suburb',
    'city','state','post_code','country'];
}
