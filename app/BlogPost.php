<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use App\User;
class BlogPost extends Model
{
    protected $fillable=['title','author','content','view','imageUrl','user_id'];

    public function comments()
    {
       return $this->hasMany(Comment::class);
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
