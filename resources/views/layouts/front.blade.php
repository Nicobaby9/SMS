  
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>School forum</title>

  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <link rel="stylesheet" href="{{asset('css/thread.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.min.css">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css')}}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('js/thread.js') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Glyphicon -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/light-box.css')}}">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  <style>
    nav .logo {
      float: left;
      margin-left: 30px;
    }

    nav .logo a {
      font-size: 28px;
      line-height: 80px;
      text-transform: uppercase;
      color: #fff;
      text-decoration: none;
      letter-spacing: 0.5px;
    }

    nav .logo em {
      font-style: normal;
      font-weight: 200;
    }

    nav {
      background: rgba(250,250,250,0.2);
      height: 80px;
      width: 100%;
      box-shadow: 0px 2px 10px 0px rgba(0,0,0,0.5);
    }
  </style>

  <!-- Scripts -->
  <script>
      window.Laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
      ]) !!};
  </script>
   
</head>
<body>

  <div id="app">

    @include('thread.partial.navbar')

    <br>
    <div class="container">

      @include('thread.partial.error')
      @include('thread.partial.success')
      <div class="row">
        @section('category')
          @include('layouts.partials.categories')
        @show

        <div class="col-md-9">
          <div class="content-wrap">
            @yield('content')
          </div>
        </div>

      </div>

    </div>
    
  </div>

  <script src="{{asset('js/main.js')}}"></script>
  <script src="{{asset('js/thread.js')}}"></script>

  @yield('js')
</body>
</html>