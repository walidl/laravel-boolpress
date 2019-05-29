<header>
  <div class=" container blog-header pt-3 pb-1">
        <div class="row flex-nowrap justify-content-around align-items-center">

          <a href="/"><h1 class="m-0"> Blog </h1></a>


            <a href="{{ route('post.create')}}" class="badge badge-light py-2 px-3">New Post</a>

        </div>
        <hr class="mb-1">
        <div class="row justify-content-center ">
          <ul class="d-flex m-0 category-menu">

            {{-- @yield('category-menu') --}}
            @foreach ($categories as $category)

              <li class="mx-4" > <a href="/category/{{$category->name}}" >{{$category->name}}</a> </li>
            @endforeach

          </ul>
        </div>
      </div>
</header>
