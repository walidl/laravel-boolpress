@extends('layout.blog-layout')

@section('content')
  <div class="container py-3">

    <div class="row mb-2">
      @foreach ($posts as $post)

        <div class="col-md-6">
          <div class="card post flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <div class="d-inline-block mb-2 ">
                @foreach ($post->categories as $category)

                  <a href="{{route('category.show',$category->name)}}" ><strong style="color: {{$category->name}}">{{ucfirst($category->name)}}</strong></a>
                  @if ($loop->remaining)
                    ,
                  @endif
                @endforeach

              </div>
              <h3 class="mb-0">
                <p class="text-dark">{{$post->title}}</p>
              </h3>
              <div class="mb-1 text-muted">{{date("D d", strtotime($post->created_at))}}</div>
              <p class="preview mb-auto">{{ $post->preview() }}</p>
              <a href="{{route('post.show', $post->id )}}">Continue reading</a>
            </div>
          </div>
        </div>
      @endforeach


      </div>
    </div>
  </div>

  </div>

@stop
