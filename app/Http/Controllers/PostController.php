<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use DB;

use App\Post;

class PostController extends Controller
{
	    
	    /*
	    //This brings the argument $post from browser and first checks the given key is in posts array
		//If not, then shows 404. If it finds then returns post.blade.php view with a given array value.
		//Then we can use this value in the post variable on view
	    public function show($post){
		    
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

	    }
		*/

		public function show ($slug){

			
			// we need to use \ here beacuse the given namespace doesn't know about the DB object.
			// Otherwise we need to put  "use DB" at the beginning
			/*$post=\DB::table('posts')
					->where('slug',$slug)
					->first();

			*/


			//We can also select data from db by below code. Even if we don't have any code in model, 
			//it searches the posts table because it looks for the plural form of the model		
			//However, it returns a different object than the above query.
			//You can check it by running dd($post); for both of them
			//$post=Post::where('slug',$slug)->firstorFail();
			//dd($post);

			/* As we put firstorFail above, we don't need to use if statement for abort
			if(!$post){
				abort(404);
			}
			*/

			return view ('post', [
				// the variable name on the left side should be same in the view too
				//'post' => $post

				// we can do the same thing by inline;
				'post'=>Post::where('slug',$slug)->firstorFail()
			]);
		}


}
