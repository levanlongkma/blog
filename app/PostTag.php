<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    protected $fillable =['post_id','user_id'];
    protected $table = 'post_tags';
}
