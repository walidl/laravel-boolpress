
<header>

<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
  <div class="container">

    <a href="/" class="navbar-brand"><h1 class="m-0"> Blog <i class="fab fa-readme"></i></h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Left Side Of Navbar -->
      <ul class="navbar-nav mr-auto align-items-center">


      <li class="nav-item dropdown mx-4">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            @foreach ($categories as $category)

              <a  class="dropdown-item" href="{{route('catIndex',$category->name)}}" >{{ucfirst($category->name)}}</a>
            @endforeach
          </div>
      </li>





      </ul>

      <!-- Right Side Of Navbar -->
      <ul class="navbar-nav  align-items-center">
        <li>
          <a href="/search" class=" search py-2 px-3">Search <i class="fas fa-search"></i></a>
        </li>
        @if (Auth::check())

          <li class="mx-4">
            <a href="{{ route('post.create')}}" class="badge badge-light py-2 px-3">New Post</a>
          </li>
        @endif
        <!-- Authentication Links -->
        @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
          @endif
        @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a  class="dropdown-item" href="{{route('myposts')}}">my posts</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
              </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>

          </div>
        </li>
      @endguest
    </ul>
  </div>
</div>
</nav>
</header>



{{-- <header>
<div class=" container blog-header pt-3 pb-1">
      <div class="row flex-nowrap justify-content-around align-items-center">

        <a href="{{ route('post.create')}}" class="badge badge-light py-2 px-3">New Post</a>
        <a href="/"><h1 class="m-0"> Blog </h1></a>
        <a href="/search" class=" search py-2 px-3">Search <i class="fas fa-search"></i></a>

      </div>
      <hr class="mb-1">
      <div class="row justify-content-center ">
        <ul class="d-flex m-0 category-menu">

          @foreach ($categories as $category)

            <li class="mx-4" > <a href="/category/{{$category->name}}" >{{ucfirst($category->name)}}</a> </li>
          @endforeach

        </ul>
      </div>
    </div>
</header> --}}
