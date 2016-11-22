<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $uplods = '/images/' ;

    protected $fillable = [
        'file'
    ];


    protected $hidden = [

    ];


    /**
     * @return array
     */
    public function getFileAttribute($photo)
    {
        return $this->uplods . $photo;
    }
}
