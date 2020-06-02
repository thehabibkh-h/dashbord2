<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\File;
use App\Category;

class Version extends Model
{
    //
    protected $fillable = [
        'file_id','category_id','status'
    ];


    public function file(){

    	return $this->belongsTo('App\File');

    }

    public function category(){

    	return $this->belongsTo('App\Category');

    }
}
