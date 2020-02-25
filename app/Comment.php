<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\BlogPost;
class Comment extends Model

{
    protected $fillable =['description','blog_post_id','user_id'];
    public function post()
    {
       return $this->belongsTo(BlogPost::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
