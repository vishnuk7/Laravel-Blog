<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeltes;

    //To Remove this error o fillable property to allow mass assignment on
    protected $fillable =[
        'title','content','category_id','featured'
    ];

    protected $dates = ['deleted_at'];

    public function category(){
        return $this->belongsTo('App/Category');
    }
}
