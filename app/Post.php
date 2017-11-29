<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    //Đổ lên admin
    protected $fillable = ['title','slug','thumbnail','description','status','content','user_id','category_id'];

    // public static function recycleBin(){
    //     return Post::onlyTrashed()->get();
    // }
    public static function getPostPanigate($pages){
    	return Post::select('posts.*','users.name as name_user')->join('users','posts.user_id','=','users.id')->simplePaginate($pages);
    }
    public static function search($content){
        return Post::where('title','like',"%$content%")->orWhere ('content','like',"%$content%")->get();
    }
    public function category(){
    	return $this->belongsTo('App\Category','category_id','id');
    }
    public static function detail($content){
    	return Post::where('slug',$content)->first();
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag','post_tags','post_id','tag_id');
    }
    
    public function postTag($arr){
        $post = Post::create($arr);

        $arr['tags'] = ['long','đẹp trai'];

        //add tag
        foreach ($arr['tags'] as $key => $value) {
            $tag = Tag::create();
        }
        PostTag::create();


    }

    public static function getAll(){

        return Post::all();
    }
    // -----------------

    // public static function delete($id){
    //     Post::find($id)->delete();
    //     return true;
    // }
    
}

