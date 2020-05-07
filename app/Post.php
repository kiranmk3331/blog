<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable  = [
        'title', 'content', 
    ];

    /** 
     * 
     * Use this instead of specifying all columns of table as fillable
    */
    
    // protected $guarded = [];
}
