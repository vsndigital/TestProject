<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

/*
How to create factory class for Article Model
php artisan make:factory ArticleFactory -m "App\Article"

Below code will create dummy articles for user_id=1
factory(App\Article::class, 5)->create(['user_id'=>1]);

*/

$factory->define(Article::class, function (Faker $faker) {
    return [
    	'user_id' => factory(\App\User::class),
    	'title' => $faker->sentence,
    	'excerpt' => $faker->sentence,
 		'body' => $faker->paragraph,
  	     //
  ];
});
