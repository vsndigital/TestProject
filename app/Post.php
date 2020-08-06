<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Datetime;

class Post extends Model
{
    public function publish(){
    	$now = new Datetime;
    	$this->published_at = $now;
    	$this->save();
    }
}
