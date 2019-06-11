<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class UserpostsController extends Controller
{
  public function getPosts(){


    $user = User::FindOrFail(auth()->user()->id);
    $posts = $user->posts;
    // dd($posts);
    return view('page.mypost',compact('posts'));
  }

  public function deletePost($id){

    $post = Post::FindOrFail($id);

    if(auth()->user()->id !== $post->user->id){

      return redirect('/')->with('error','Unothorized Page');
    }else{

      $post->delete();
    }
  }
}
