<?php

namespace App\Http\Controllers;

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
    public function store(Request $request)
    {
      $post =$request->validate([

          'title' => 'required',
          'body' => 'required'
        ]);

      // dd($request->check_list);

      $newPost  = Post::create($post)->categories()->sync($request->check_list);

      return redirect('/');


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

        return view('page.edit-post',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


      $post =$request->validate([

          'title' => 'required',
          'body' => 'required'
        ]);


      Post::whereId($id)->update($post);

      $upPost = Post::FindOrFail($id)->categories()->sync($request->check_list);
      

      return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post =$request->validate([

          'title' => 'required',
          'body' => 'required'
        ]);

      // dd($request->check_list);

      $newPost  = Post::create($post)->categories()->sync($request->check_list);

      return redirect('/');
    }
}
