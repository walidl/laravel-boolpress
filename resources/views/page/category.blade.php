@extends('layout.blog-layout')

@section('content')


  <div class="flex-column mb-3" style="background-color: {{$cat->name}}" >
    <div class="container p-2">
      <h2 class=" categoryTitle m-0">{{ucfirst($cat->name)}}</h2>

    </div>
  </div>

  <div class="container pb-3">


    <div class="row mb-2">
      @foreach ($cat->posts as $post)

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
              <div class="mb-1 text-muted">{{date("D d", strtotime($post->created_at))}}</div>
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
