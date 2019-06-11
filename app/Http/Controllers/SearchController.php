<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;



class SearchController extends Controller
{
    public function search(Request $request){

      $categories = Category::all();
      $users = User::all();

      $posts = $this->searchAndFind($request);

      return view('page.search',compact('categories','users','posts'));

    }

    public function searchAndFind($request){

      $title = $request->input('title');
      $content = $request->input('content');
      $category = $request->input('category');
      $user = $request->input('user');
      // dd($title,$content,$category,$author);


        $q = Post::query();

      // Parto da tutti i post che hanno una determinata categoria
      // eleganza e furberia

        if($category){

          $q = Category::FindOrFail($category)-> posts();

      }


        if($title){

          $q->where('title','LIKE' ,'%' . $title .'%' );

        }

        if($content){

          $q->where('body','LIKE' , '%'. $content .'%' );
        }

        if($user){

          $q->where('user_id','=' , $user );


        }

        // Joined query
        // Carroarmato

          // if($category){
          //
          //   $q->whereHas('categories', function ($query) use ($category) {
          //       return $query->where('category_id','=', $category);
          //     });
          //
          // }

        $posts = $q->get();


        // dd($posts);

        return $posts;


    }
}
