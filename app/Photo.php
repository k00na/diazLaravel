<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

	// default folder for images
    protected $uploads = '/images/';

    protected $fillable = [

    	'file'

    ];

    // accessor 
    public function getFileAttribute($photo){

    	return $this->uploads . $photo;
    }

}
