@extends('layout.blog-layout')

@section('content')
  <div class="container py-3">
    <div class="row justify-content-center">

      <h2 class="my-3">Last Posts</h2>
    </div>

    <div class="row mb-2">

      @foreach ($posts as $post)

        <div class="col-md-6">
          <div class="card post flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <div class="d-flex justify-content-end mb-2 categories">
                @foreach ($post->categories as $category)

                  <a href="{{route('catIndex',$category->name)}}" class="d-inline-block px-1 category ml-1" style="background-color: {{$category->name}}"><strong >{{ucfirst($category->name)}}</strong></a>

                @endforeach

              </div>
              <h3 class="mb-0">
                <p class="text-dark mb-0">{{$post->title}}</p>
              </h3>
              <div class="mb-2 ">
                <small class="mb-1 text-muted mr-2">{{date("D d", strtotime($post->created_at))}}</small>|
                <small > By <a href="#">{{$post->author->username}}</a> </small>
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
    </div>
  </div>

  </div>

@stop
