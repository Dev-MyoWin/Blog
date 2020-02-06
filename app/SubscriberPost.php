<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriberPost extends Model
{
    protected $fillable=['name','email','confirmation_code','scribe'];
}
