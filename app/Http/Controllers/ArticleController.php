<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    
    
    /*
    public function show($id){

    	$article=Article::findorFail($id);
    	//return $article;

    	return view('articles.show', [
    		'article'=> $article
    	]);

    }*/
    //Instead of passing id, we can pass Article object itself. Laravel is smart enough to find which id we are looking for and brings it. The argument we pass to the function and the value on controller side should be same.
    public function show(Article $article){

        return view('articles.show', [
            'article'=> $article
        ]);

    }

    public function index(){
    	$articles=Article::latest()->get();

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function create(){

        return view('articles.create');
    }

    public function store(){
        
        //dd(request()->all());
        
        /*As we use the data in validated array, we can assign them to a variable $validatedAttributes and then use them wherever we need.
        $validatedAttributes = request()->validate([
            'title'=> ['required'], //min:3 , max:255 etc 
            'body' => 'required',
            'excerpt' => 'required'
        ]);*/
        

         /*This is the long way to store data. We can use below code fro refactoring
        $article = new Article();
        $article->title =request('title');
        $article->excerpt =request('excerpt');
        $article->body =request('body');
        $article->save();
        */

        /*As we have $validatedAtrributes, we don't need to specify every attribute here again. We can just pass $validatedAttributes variable and we are done. 
        Article::create([
            'title' => request('title'),
            'excerpt' => request('excerpt'),
            'body' => request('body')
        ]);
        */

        //Article::create($validatedAttributes);

        /*And this is the inlined version and it's the short version 
        Article::create(request()->validate([
            'title'=> ['required'], //min:3 , max:255 etc 
            'body' => 'required',
            'excerpt' => 'required'
        ]));
        */

        //But this is the shortest version by a seperate validate function

        Article::create($this->validateArticle());

        return redirect('/articles');
        

    }

    public function edit(Article $article){
        
        //We have refactored the below code
        //$article=Article::find($id);
        
        //return view('articles.edit' , ['article'=>$article]);
        return view('articles.edit' , compact('article'));
    }

    public function update(Article $article){

        $article->update($this->validateArticle());

        /*We have build another function for validation because we use it the same in update and store functions.
        request()->validate([s
            'title'=> ['required'], //min:3 , max:255 etc 
            'body' => 'required',
            'excerpt' => 'required'
        ]);
        */

        // removed this code for refactoring $article=Article::find($id);
        /* Removed the below code for refactoring
        $article->title =request('title');
        $article->excerpt =request('excerpt');
        $article->body =request('body');
        $article->save();
        */
        
        //If we want to use named routes here we can replace the url with the named route as follow
        //return redirect(route('articles.show',$article));
        
        //We can also build a path function in model and use it for routing as follow
        return redirect($article->path());

        //return redirect('/articles/' . $article->id);
        
    }

    protected function validateArticle(){
        return request()->validate([
            'title'=> ['required'], //min:3 , max:255 etc 
            'body' => 'required',
            'excerpt' => 'required'
        ]);
    }
}
