<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Tag extends Model
{
	use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = ['name','slug'];
    protected $table = 'tags';
    public function posts(){
    	return $this->belongsToMany('App\Post','post_tags','tag_id','post_id');
    }
}
