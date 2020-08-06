<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


//Route::get('/test', function () {
	/*
	$name 		= request('name');
	$lastName	= request('lastName');

    return view('test', [
    	'name' 		=> 	$name,
    	'lastName' 	=>	$lastName

    ]);
    */

    //This is how we inline the same code above
    /*
    return view ('test', [
    	'name' => request('name'),
    	'lastName' => request('lastName')
    	
    ]);
});
*/


/*
Route::get('/posts/{post}', function ($post) {

	$posts = [
		'first-post' => 'This is the first blog post',
		'second-post' => 'Second blog post, as you guess'
	];

	if(!array_key_exists($post, $posts)){
		abort(404, 'Sorry, we couldnt find it');

	}

    return view('post', [
    	'post' => $posts[$post]
    ]);
});
*/

Route::get('posts/{post}', 'PostController@show');

Route::get('about-us', function(){

	return view('about-us');
});

/*
Route::get('articles', function(){

    //$articles=App\Article::all();
    //$articles=App\Article::take('2')->get();
    //$articles=App\Article::paginate(1);
    $articles=App\Article::paginate(2);

    //return $article;

        return view('articles', [
            'articles' => $articles
        ]);
});
*/

Route::get('articles', 'ArticleController@index');
Route::post('articles', 'ArticleController@store');
Route::get('articles/create', 'ArticleController@create');
Route::get('articles/{article}', 'ArticleController@show');
Route::get('articles/{article}/edit', 'ArticleController@edit');
Route::put('articles/{article}', 'ArticleController@update');





