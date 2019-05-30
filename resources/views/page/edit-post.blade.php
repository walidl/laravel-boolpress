@extends('layout.blog-layout')


@section('content')
  <div class="container py-3 ">

    <div class="row justify-content-center">

      <div class="col-8 ml-col-2">

        <form class="" action="{{route('post.update',$post->id)}}" method="post">

          @csrf
          @method('PATCH')

          <div class="form-group" >
            <label for="title">Title</label>
            <input type="text" class="form-control" name = "title" value="{{$post->title}}">
          </div>

          <div class="form-group">
            <label for="body">Article</label>
            <textarea type="text" class="form-control" name = "body"  rows="15"> {{$post->body}}</textarea>
          </div>
          <div class="form-group form-check pl-0">
            <label for="check_list[]">Categories</label>
            <option value="" disabled selected>Choose Categories</option>

            @foreach ($categories as $category)

              <input type="checkbox" name="check_list[]" value="{{$category->id}}"  {{$post->checkCategory($category->id)}}><label>{{ucfirst($category->name)}}  </label><br>

            @endforeach
          </div>

          <div class="form-group form-check pl-0">
            <select class="form-control form-control-sm" name="author_id">
              <option value="">Author</option>

              @foreach ($authors as $author)
                <option   {{ $author->id === $post->author_id ? "selected" : "" }} value="{{$author->id}}">{{$author->username}}</option>

              @endforeach
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>

  </div>
@stop
