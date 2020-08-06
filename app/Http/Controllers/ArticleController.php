<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    
    
    /*
    public function show($id){

    	$article=Article::find($id);
    	//return $article;

    	return view('articles.show', [
    		'article'=> $article
    	]);

    }*/
    //Instead of passing id, we can pass Article object itself. Laravel is smart enough to find which id we are looking for and brings it. The argument we pass to the function and the value on controller side should besame
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
        
        

         //This is the long way to store data
        $article = new Article();
        $article->title =request('title');
        $article->excerpt =request('excerpt');
        $article->body =request('body');
        $article->save();
        return redirect('/articles');
        

    }

    public function edit($id){
        $article=Article::find($id);
        
        //return view('articles.edit' , ['article'=>$article]);
        return view('articles.edit' , compact('article'));
    }

    public function update($id){

        request()->validate([
            'title'=> ['required'], //min:3 , max:255 etc 
            'body' => 'required',
            'excerpt' => 'required'
        ]);

        $article=Article::find($id);
        $article->title =request('title');
        $article->excerpt =request('excerpt');
        $article->body =request('body');
        $article->save();
        return redirect('/articles/' . $article->id);
        
    }
}
