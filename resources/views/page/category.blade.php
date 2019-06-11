@extends('layouts.app')

@section('content')


  <div class="flex-column mb-3" style="background-color: {{$categoryName}}" >
    <div class="container p-2">
      <h2 class=" categoryTitle m-0">{{ucfirst($categoryName)}}</h2>

    </div>
  </div>

  <div class="container pb-3">


    @include('parts.post-component')
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
        >

        </post-card>
      @endforeach

  </div>
</div>
</div>

</div>

@stop
