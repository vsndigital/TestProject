<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    
	//If we are searching the articles by slugs, we need to override the below function so that laravel can find the related id for that slug.
    public function getRouteKeyName(){
    	return 'slug';
    }
}
