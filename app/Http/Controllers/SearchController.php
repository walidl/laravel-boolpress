<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Author;



class SearchController extends Controller
{
    public function search(Request $request){

      $categories = Category::all();
      $authors = Author::all();

      $posts = $this->searchAndFind($request);

      return view('page.search',compact('categories','authors','posts'));

    }

    public function searchAndFind($request){

      $title = $request->input('title');
      $content = $request->input('content');
      $category = $request->input('category');
      $author = $request->input('author');
      // dd($title,$content,$category,$author);

      if($title == null && $content == null && $category == null && $author == null){

        return [];
      }
      else{

        $q = Post::query();

        if($title != null && $title != ""){

          $q->where('title','LIKE' ,'%' . $title .'%' );

        }

        if($content != null && $content != ""){

          $q->where('body','LIKE' , '%'. $content .'%' );
        }

        if($author != null && $author != ""){

          $q->where('author_id','=' , $author );


        }

          if($category != null && $category != ""){

            $q->whereHas('categories', function ($query) use ($category) {
                return $query->where('category_id','=', $category);
              });
            // $q=Post::whereHas('categories')->where('id','=', $category);

        }

        $posts = $q->get();


        // dd($posts);

        return $posts;
      }

    }
}
