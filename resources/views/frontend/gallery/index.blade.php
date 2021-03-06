@extends('landing-page.index')


@section('css')

  <link rel="apple-touch-icon" href="apple-touch-icon.png">

  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-theme.min.css')}}">
  <link rel="stylesheet" href="{{ asset('css/fontAwesome.css')}}">
  <link rel="stylesheet" href="{{ asset('css/light-box.css')}}">
  <link rel="stylesheet" href="{{ asset('css/templatemo-style.css')}}">

  <link href="https://fonts.googleapis.com/css?family=Kanit:100,200,300,400,500,600,700,800,900" rel="stylesheet">

  <script src="{{ asset('jvscript/vendor/modernizr-2.8.3-respond-1.4.2.min.js')}}"></script>

@endsection

@section('content')
    <div id="video-container">
        <div class="video-overlay"></div>
        <div class="video-content">
            <div class="inner">
              <h1>Welcome to <em>Gallery</em></h1>
              <p>This is our main Gallery</p>
                <div class="scroll-icon">
                    <a class="scrollTo" data-scrollTo="portfolio" href="#portfolio"><img src="{{ asset('img/scroll-icon.png')}}" alt=""></a>
                </div>    
            </div>
        </div>
        <video autoplay="" loop="" muted>
          <source src="{{ asset('img/highway-loop.mp4')}}" type="video/mp4" />
        </video>
    </div>

    <div class="grid-portfolio" id="portfolio">
        <div class="container">
            <div class="row">
              @forelse($galleries as $gallery)
                <div class="col-md-4 col-sm-6">
                    <div class="portfolio-item">
                        <div class="thumb">
                            <a href="{{ asset('gallery/'.$gallery->photo) }}" data-lightbox="image-1"><div class="hover-effect">
                                <div class="hover-content">
                                    <h1>{{ $gallery->title }}</h1>
                                    <p>{{ $gallery->subtitle }}</p>
                                    <p class="float-right" style="color: lime;">{{ \Carbon\Carbon::parse($gallery->created_at)->format('d-M-Y') }}</p>
                                </div>
                            </div></a>
                            <div class="image">
                                <img src="{{ asset('gallery/'.$gallery->photo) }}" height="260" width="350">
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-lg-12 col-md-12 col-sm-6 text-center text-white">
                  <h3>THERE IS NO PHOTO</h3>
                </div>
                @endforelse
            </div>
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="load-more-button">
                        <a href="#">Load More</a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>

    <!-- <footer>
        <div class="container-fluid">
            <div class="col-md-12">
                <p>Copyright &copy; 2018 Company Name | Designed by TemplateMo</p>
            </div>
        </div>
    </footer> -->

    <!-- Modal -->
    <div id="modal" class="modal">
      <!-- Modal Content -->
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h3 class="header-title">Say hello to <em>Highway</em></h3>
          <div class="close-btn"><img src="{{ asset('img/close_contact.png')}}" alt=""></div>    
        </div>
        <!-- Modal Body -->
        <div class="modal-body">
          <div class="col-md-6 col-md-offset-3">
            <form id="contact" action="" method="post">
                <div class="row">
                    <div class="col-md-12">
                      <fieldset>
                        <input name="name" type="text" class="form-control" id="name" placeholder="Your name..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <input name="email" type="email" class="form-control" id="email" placeholder="Your email..." required="">
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your message..." required=""></textarea>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="btn">Send Message Now</button>
                      </fieldset>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <section class="overlay-menu">
      <div class="container">
        <div class="row">
          <div class="main-menu">
              <ul>
                  <li>
                      <a href="index.html">Home - Full-width</a>
                  </li>
                  <li>
                      <a href="masonry.html">Home - Masonry</a>
                  </li>
                  <li>
                      <a href="grid.html">Home - Small-width</a>
                  </li>
                  <li>
                      <a href="about.html">About Us</a>
                  </li>
                  <li>
                      <a href="blog.html">Blog Entries</a>
                  </li>
                  <li>
                      <a href="single-post.html">Single Post</a>
                  </li>
              </ul>
              <p>We create awesome templates for you</p>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{ asset('jvscript/vendor/jquery-1.11.2.min.js') }}"></script>')</script>

    <script src="{{ asset('jvscript/vendor/bootstrap.min.js') }}"></script>
    
    <script src="{{ asset('jvscript/plugins.js') }}"></script>
    <script src="{{ asset('jvscript/main.js') }}"></script>
@endsection
