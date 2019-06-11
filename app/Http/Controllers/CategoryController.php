<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;



class CategoryController extends Controller
{

    public function catIndex($name)
    {



      $category = Category::where('name', 'LIKE', $name)->first();
      $posts = $category->posts()->get();
      // dd($posts);

      return view('page.category',compact('posts'))
      ->with('categoryName', $category->name);


    }


}
