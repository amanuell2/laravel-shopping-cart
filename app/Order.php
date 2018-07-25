<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // creating order and user relation

    public function user(){
       return $this->belongsTo('App\User');
    }

}
