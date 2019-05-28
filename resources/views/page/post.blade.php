@extends('layout.blog-layout')

@section('content')
  <div class="container py-3 ">

    <div class="row justify-content-center">

      <div class="col-8 ml-col-2">

        <h1>{{$post->title}}</h1>
        <div class="mb-1 text-muted">{{date("M d, Y", strtotime($post->created_at))}}</div>

        <hr>

        <article class="">

          {!! $post->body !!}

        </article>

      </div>
    </div>


  </div>

@stop
