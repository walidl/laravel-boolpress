@extends('layout.blog-layout')

@section('content')
  <div class="container py-3 ">

    <div class="row justify-content-center">

      <div class="col-8 ml-col-2">

        <h1>{{$post->title}}</h1>
        <div class="d-flex justify-content-between">

          <div class="">
            <span class="mb-1 text-muted mr-2">{{date("D d", strtotime($post->created_at))}}</span>
            <span > By <a href="#">{{$post->author->username}}</a> </span>

          </div>
          <div class="d-flex justify-content-start mb-2 categories">
          @foreach ($post->categories as $category)

            <a href="{{route('catIndex',$category->name)}}" class="d-inline-block px-1 category " style="background-color: {{$category->name}}"><b>{{ucfirst($category->name)}}</b> </a>

          @endforeach

        </div>
        </div>
        <hr>

        <article class="">

          {!! $post->body !!}

        </article>

      </div>
    </div>


  </div>

@stop
