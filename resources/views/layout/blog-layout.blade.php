<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


        <!-- Fonts -->
                <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

                <!-- Styles -->

                <link rel="stylesheet" href="{{mix('css/app.css')}}">

                {{-- Jquery --}}
                <script src="{{mix('js/app.js')}}" charset="utf-8"></script>
    </head>
    <body>


        @if ($errors->any())
          <div class="container">


          @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
              {{ $error }}
            </div>

          @endforeach


          </div>
        @endif

        @yield('content')

    </body>
</html>
