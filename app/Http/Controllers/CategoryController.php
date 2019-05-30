<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;



class CategoryController extends Controller
{

    public function catIndex($name)
    {
      $cat = Category::where('name', 'LIKE', $name)->first();
      // dd($category);

      return view('page.category',compact('cat'));


    }


}
