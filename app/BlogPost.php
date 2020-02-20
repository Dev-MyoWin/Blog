<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
class BlogPost extends Model
{
    protected $fillable=['title','author','content','view'];

    public function comments()
    {
       return $this->hasMany(Comment::class);
    }
}
