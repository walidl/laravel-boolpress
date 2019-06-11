@extends('layouts.app')

@section('content')


  <div class="container">
    <div class="row px-2 ">
      <div class="col-12 p-3 mb-3">

        <form class="form align-items-center d-flex flex-wrap justify-content-center" action="{{route('search.get')}}" method="GET" >

          <div class="form-group col-sm-12 col-md-6 mr-md-2 mb-2 row" >
            <input type="text" class="form-control" name = "title" value="{{ app('request')->input('title') }}" placeholder="Title">
          </div>

          <div class="form-group col-sm-12 col-md-6 mb-2 row">
            <input type="text" class="form-control" name = "content" value="{{ app('request')->input('content') }}" placeholder="content" >
          </div>

          <div class="form-group col-sm-12 col-md-6 mr-md-2 mb-2 row ">
            <select class="form-control form-control" name="category" >
              <option value="">Category</option>

              @foreach ($categories as $category)
                <option  value="{{$category->id}}" {{ app('request')->input('category') == $category->id ? "selected" : "" }}>{{$category->name}}</option>

              @endforeach
            </select>
          </div>

          <div class="form-group col-sm-12 col-md-6   mb-2 row ">
            <select class="form-control form-control" name="user">
              <option value="">Author</option>

              @foreach ($users as $user)
                <option name="" value="{{$user->id}}" {{ app('request')->input('user') == $user->id ? "selected" : "" }}>{{$user->name}}</option>

              @endforeach
            </select>
          </div>

          <button type="submit" class="btn btn-primary  col-sm-11 col-md-auto">Search</button>
        </form>
      </div>
    </div>

    @if (count($posts) > 0)

      <h2> Results</h2>

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
  @else

    <div class="alert alert-dark" role="alert">
     0 Results  - <a href="/search">refresh</a>
    </div>
  @endif
  </div>
@stop
