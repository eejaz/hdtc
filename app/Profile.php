<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [

        'photo_id',
        'city_id',
        'fullname',
        'gender',
        'qualification',
        'proficient',



    ];


    public function  city(){

        return $this->belongsTo('App\City');

    }

    public function  photo(){

        return $this->belongsTo('App\Photo');

    }

    public function  profile(){

        return $this->belongsTo('App\Profile');

    }
}
