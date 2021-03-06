@extends('layouts.app')


@section('content')
  <div class="container py-3 ">

    <div class="row justify-content-center">

      <div class="col-8 ml-col-2">

        <form class="" action="{{route('post.update',$post->id)}}" method="post">

          @csrf
          @method('PATCH')

          <div class="form-group" >
            <label for="title">Title</label>
            <input type="text" class="form-control {{$errors->has('title') ? "border-danger" : "" }}" name = "title" value="{{$post->title}}">
            {!! $errors->first('title', '<small class="form-text text-danger">:message</small>') !!}

          </div>

          <div class="form-group">
            <label for="body">Article</label>
            <textarea type="text" class="form-control {{$errors->has('body') ? "border-danger" : "" }}" name = "body"  rows="15"> {{$post->body}}</textarea>
            {!! $errors->first('body', '<small class="form-text text-danger">:message</small>') !!}

          </div>

          <div class="form-group form-check pl-0">
            <label for="check_list[]">Categories</label>
            <option value="" disabled selected>Choose Categories</option>
            {!! $errors->first('check_list', '<small class="form-text text-danger">:message</small>') !!}

            @foreach ($categories as $category)

              <div class="d-flex align-items-center">
                <input type="checkbox" name="check_list[]" value="{{$category->id}}"  {{$post->checkCategory($category->id)}} > <label class="m-0 ml-1">{{ucfirst($category->name)}}  </label>
              </div>

            @endforeach
          </div>

          
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>

  </div>
@stop
