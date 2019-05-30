@extends('layout.blog-layout')


@section('content')
  <div class="container py-3 ">

    <div class="row justify-content-center">

      <div class="col-8 ml-col-2">

        <form class="" action="{{route('post.store')}}" method="post">

          @csrf

          <div class="form-group" >
            <label for="title">Title</label>
            <input type="text" class="form-control" name = "title" placeholder="Enter Title">
            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
          </div>

          <div class="form-group">
            <label for="body">Article</label>
            <textarea type="text" class="form-control" name = "body" placeholder="Article..." rows="15"></textarea>
          </div>

          <div class="form-group form-check pl-0">
            <label for="check_list[]">Categories</label>
            <option value="" disabled selected>Choose Categories</option>

            @foreach ($categories as $category)

              <input type="checkbox" name="check_list[]" value="{{$category->id}}"><label>{{ucfirst($category->name)}}  </label><br>
            @endforeach
          </div>

          <div class="form-group form-check pl-0">
            <select class="form-control form-control-sm" name="author_id">
              <option value="">Author</option>

              @foreach ($authors as $author)
                <option  value="{{$author->id}}">{{$author->username}}</option>

                {{-- <label>{{ucfirst($category->name)}}  </label><br> --}}
              @endforeach
            </select>
          </div>


          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>

  </div>
@stop
