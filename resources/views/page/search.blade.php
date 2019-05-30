@extends('layout.blog-layout')

@section('content')


  <div class="container">
    <div class="row ">
      <div class="col-12 p-3 mb-3">

        <form class="form-inline justify-content-between align-items-center" action="{{route('search.get')}}" method="GET" >


        <div class="form-group row" >
          <input type="text" class="form-control" name = "title" value="{{ app('request')->input('title') }}" placeholder="Title">
        </div>

        <div class="form-group row">
          <input type="text" class="form-control" name = "content" value="{{ app('request')->input('content') }}" placeholder="content" >
        </div>

        <div class="form-group row ">
          <select class="form-control form-control" name="category" >
            <option value="">Category</option>

            @foreach ($categories as $category)
              <option  value="{{$category->id}}" {{ app('request')->input('category') == $category->id ? "selected" : "" }}>{{$category->name}}</option>

            @endforeach
          </select>
        </div>

        <div class="form-group row ">
          <select class="form-control form-control" name="author">
            <option value="">Author</option>

            @foreach ($authors as $author)
              <option name="" value="{{$author->id}}" {{ app('request')->input('author') == $author->id ? "selected" : "" }}>{{$author->username}}</option>

            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
      </div>
    </div>

    @if (sizeof($posts) > 0)

      <h2> Results</h2>
      <div class="row">


        @foreach ($posts as $post)

          <div class="col-md-6">
            <div class="card post flex-md-row mb-4 shadow-sm h-md-250">
              <div class="card-body d-flex flex-column align-items-start">
                <div class="d-flex justify-content-end mb-2 categories">
                  @foreach ($post->categories as $category)

                    <a href="{{route('category.show',$category->name)}}" class="d-inline-block px-1 category ml-1" style="background-color: {{$category->name}}"><strong >{{ucfirst($category->name)}}</strong></a>

                  @endforeach

                </div>
                <h3 class="mb-0">
                  <p class="text-dark">{{$post->title}}</p>
                </h3>
                <div class="">
                  <span class="mb-1 text-muted mr-2">{{date("D d", strtotime($post->created_at))}}</span> |
                  <span > By <a href="#">{{$post->author->username}}</a> </span>
                </div>
                <p class="preview mb-auto">{{ $post->preview() }}</p>
                <div class="d-flex justify-content-between links">

                  <a href="{{route('post.show', $post->id )}}">Continue reading</a>
                  <a href="{{route('post.edit', $post->id )}}">Edit</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach

      </div>
    @endif
  </div>
@stop
