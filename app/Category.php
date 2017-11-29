<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $table = 'categories';
    protected $fillable = ['name','slug'];


    public function post(){
    	return $this->hasMany('App\Post','category_id','id');
    }
    //lấy bản ghi slug
    public static function category($slug){
        return Category::where('slug',$slug)->first();
    }
    public static function getCategory(){
    	return Category::all();
    }
}
