<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    //
    protected $fillable = [
        'user_id','cart',
    ];
    public function user(){
        return $this->BelongsTo('App\User');
    }
}
