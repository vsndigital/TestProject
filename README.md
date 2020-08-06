<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

How to connect to Database
1. To connect a mysql server from commandline use the following command.
	This will let us in with root priviliges
	mysql -u root

2. Then you can show all the databases in server by this:
	SHOW DATABASES;

3. You can create database by (You can change the name of the database);
	CREATE DATABASE testproject;

4.


MIGRATION

php artisan make:migration create_posts_table

php artisan migrate  

php artisan migrate:rollback --> this returns the last migration back

php artisan migrate:refresh --> this drops all the tables and builds again, YOU LOSE ALL DATA

MODEL 

php artisan make:model Post -mcf --> this builds model file with the all 3 files: mcf migration,controller and factory files. We can also use only 1, such as -m and this only builds model with the migration.


TINKER

$post= new App\Post;   				##this builds a new record
$post->body='Body of the post';
$post->save();

App\Post::all();  					##this brings the all data from posts table 
App\Post::first();					##this returns the first record from the table. we can then use $post->publish() or 									any other functions we declared in the model
App\Post::where						##However this returns a collection and we can't look inside as we 	
		('slug', 'first-post')		did above.Instead of get, we can use first. 
		->get();																