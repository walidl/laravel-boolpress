<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\Category;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories= Category::all();



        return view('page.new-post',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
    // dd($request->all());

      $validData = $request->validated();
      $post = new Post;
      $post->title = $validData['title'];
      $post->body = $validData['body'];
      $post->user_id = auth()->user()->id;
      $post->save();

      $categoryIds = $validData['check_list'];
      $categories = Category::find($categoryIds);
      $post->categories()->sync($categories);


      return redirect('/')->with('success','New Post created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::FindOrFail($id);

        return view('page.post',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::FindOrFail($id);
        $categories= Category::all();

        if(auth()->user()->id !== $post->user->id){

          return redirect('/')->with('error','Unothorized Page');
        }else{
          return view('page.edit-post',compact('post','categories'));

        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {

      $validData = $request->validated();

      $post= Post::FindOrFail($id);
      $post->update($validData);

      $categoryIds = $validData['check_list'];
      $categories = Category::find($categoryIds);
      $post->categories()->sync($categories);


      return redirect('/')->with('success','post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
