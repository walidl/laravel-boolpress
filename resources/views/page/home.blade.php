@extends('layouts.app')

@section('content')
  <div class="container py-3">
    <div class="row justify-content-center">

      <h2 class="my-3">Last Posts</h2>
    </div>
    <div class="row mb-2" id="posts">

      @foreach ($posts as $post)


        <post-card

          post-id = '{{$post->id}}'
          :categories ='{{$post->categories}}'
          title = '{{$post->title}}'
          user-name  =  '{{$post->user->name}}'
          body = '{{$post->body}}'
          preview = '{{ $post->preview() }}'
          created-at ='{{date("D d", strtotime($post->created_at))}}'
          is-logged = '{{ Auth::check() && (auth()->user()->id == $post->user->id) }}'
        > </post-card>
      @endforeach


      </div>
    </div>
  </div>

  </div>

  @include('parts.post-component')
@stop
