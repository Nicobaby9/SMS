<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SMAN 1 Montreal</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('landing-page/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ asset('landing-page/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landing-page/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{ asset('landing-page/css/landing-page.min.css') }}" rel="stylesheet">

  <link rel="apple-touch-icon" href="apple-touch-icon.png">

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/fontAwesome.css')}}">
  <link rel="stylesheet" href="{{ asset('css/light-box.css')}}">
  <link rel="stylesheet" href="{{ asset('css/templatemo.css')}}">

  <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <script src="{{ asset('jvscript/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>
  @yield('css')

  <style>
    .rainbow {
      background-image: -webkit-gradient( linear, left top, right top, color-stop(0, #fccc63), color-stop(0.15, #fccc63), color-stop(0.3, #fbad50), color-stop(0.45, #bc2a8d), color-stop(0.6, #8a3ab9),color-stop(0.75, #bc2a8d), color-stop(0.9, #cd486b), color-stop(0, #8a3ab9) );
      color:transparent;
      -webkit-background-clip: text;
      background-clip: text;
    }
  </style>
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a href="/" title=""><img src="https://www.sts-school.edu.in/wp-content/uploads/2019/10/Best-School-in-Meerut-1.png" alt="..." style="width: 50px; height: 50px;"></a>
      <a class="navbar-brand" href="/forum">Forum</a>
      <a class="navbar-brand" href="/articles">Article</a>
      <a class="navbar-brand" href="/galery">Galery</a>
      <a class="navbar-brand" href="#">Contact Us</a>
      <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
    </div>
  </nav>

  @yield('content')

  <!-- Footer -->
  <footer class="footer bg-dark text-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#" style="color: white;">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#" style="color: white;">Contact</a>
            </li><p class="text-muted small mb-4 mb-lg-0 text-dark">Copyright &copy; <a href="https://adminlte.io" style="color: black;">SMAN 1 MONTREAL</a>. All Rights Reserved.</p>
          </ul>
        </div>
        <div class="col-lg-6 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw" style="color: blue;"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw" style="color: skyblue;"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw rainbow"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('landing-page/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('landing-page/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  @yield('js')

</body>

</html>
