<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    
	/*If we are searching the articles by slugs, we need to override the below function so that laravel can find the related id for that slug.
    
    public function getRouteKeyName(){
    	return 'slug';
    }
    */

    protected $fillable = ['title', 'body', 'excerpt']; 

    public function path(){
    	return route('articles.show', $this);
    }

    
    /*Below code is the original but in real life articles belong to authors not users, so we may change it as follows
    public function user(){
    	return $this->belongsTo(User::class);
    }
    */

    public function author(){
        return $this->belongsTo(User::class, 'user_id'); //As we changed the function name to author, by default laravel searches for author_id as a foreign key. However there is no foreign key like that. To correct it, we supplied 'user_id' as an argument and now it works
    }
}
