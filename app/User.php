<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    public function purchases(){
        return $this->hasMany('App\Purchase');
    }

}
