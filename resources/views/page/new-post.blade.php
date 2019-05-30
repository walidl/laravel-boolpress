@extends('layout.blog-layout')


@section('content')
  <div class="container py-3 ">

    <div class="row justify-content-center">

      <div class="col-8 ml-col-2">

        <form class="" action="{{route('post.store')}}" method="post">

          @csrf

          <div class="form-group" >
            <label for="title">Title</label>
            <input type="text" class="form-control {{$errors->has('title') ? "border-danger" : "" }}" name = "title" placeholder="Enter Title">
            {!! $errors->first('title', '<small class="form-text text-danger">:message</small>') !!}
          </div>

          <div class="form-group">
            <label for="body">Article</label>
            <textarea type="text" class="form-control {{$errors->has('body') ? "border-danger" : "" }}" name = "body" placeholder="Article..." rows="15"></textarea>
              {!! $errors->first('body', '<small class="form-text text-danger">:message</small>') !!}
          </div>

          <div class="form-group form-check pl-0" >
            <label for="check_list[]">Categories</label>
            <option value="" disabled selected>Choose Categories</option>
            {!! $errors->first('check_list[]', '<small class="form-text text-danger">:message</small>') !!}

            @foreach ($categories as $category)
              <div class="d-flex align-items-center">
                <input type="checkbox" name="check_list[]" value="{{$category->id}}" > <label class="m-0 ml-1">{{ucfirst($category->name)}}  </label>
              </div>
            @endforeach
          </div>

          <div class="form-group form-check pl-0">
            <select class="form-control form-control-sm {{$errors->has('author_id') ? "border-danger" : "" }}" name="author_id">
              <option value="">Author</option>

              @foreach ($authors as $author)
                <option  value="{{$author->id}}">{{$author->username}}</option>

              @endforeach
            </select>
            {!! $errors->first('author_id', '<small class="form-text text-danger">:message</small>') !!}
          </div>


          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>

  </div>
@stop
