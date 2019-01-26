<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    protected $fillable = ['userId', 'id', 'title', 'body'];



    public function getKeyName()
    {
        return '__id';
    }
}
