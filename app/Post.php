<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //To Remove this error o fillable property to allow mass assignment on
    protected $fillable =[
        'title','content','category_id','featured'
    ];

    public function category(){
        return $this->belongsTo('App/Category');
    }
}
