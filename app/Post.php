<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    //To Remove this error o fillable property to allow mass assignment on
    protected $fillable =[
        'title','content','category_id','featured','slug'
    ];

    public function getFeaturedAttribute($featured){

        return asset($featured);

    }

    protected $dates = ['deleted_at'];

    public function category(){
        return $this->belongsTo('App/Category');
    }
}
