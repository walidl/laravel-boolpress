@extends('layouts.app')

@section('content')
  <div class="container py-3">
    <div class="row justify-content-center">

      <h2 class="my-3">Last Posts</h2>
    </div>

      @if (count($posts) > 0)

        <div class="row mb-2" id="myposts">

          @foreach ($posts as $post)

            <mypost-card

            post-id = '{{$post->id}}'
            :categories ='{{$post->categories}}'
            title = '{{$post->title}}'
            > </mypost-card>

          @endforeach


        </div>
        @include('parts.mypost-component')
      @else

        <div class="alert alert-dark" role="alert">
         0 Results  - <a href="{{route('post.create')}}">Create a new post</a>
        </div>
      @endif
  </div>


  </div>

@stop
