@extends('landing-page.index')

@section('css')
<style type="text/css">
  .pagination li{
    float: left;
    list-style-type: none;
    margin:5px;
    position: relative;
  }
</style>
@endsection

@section('content')
  <!--Main layout-->
  <main class="mt-5 pt-5">
    <div class="container">

      <!--Section: Jumbotron-->
      <section class="card wow fadeIn" style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg);">

        <!-- Content -->
        <div class="card-body text-white text-center py-5 px-5 my-5">

          <h1 class="mb-4">
            <strong>Kumpulan Artikel Sekolah</strong>
          </h1>
          <p>
            <strong>Apa itu Blog? Blog adalah sebuah aplikasi website yang berisi konten-konten tertentu. Dikutip dari Wikipedia, blog atau web log adalah bentuk aplikasi web yang berbentuk tulisan-tulisan atau biasa disebut posting pada sebuah sebuah halaman website. Situs website atau blog ini biasanya dapat diakses oleh semua pengguna internet sesuai dengan topik dan tujuan pengguna blog tersebut. 
            </strong>
          </p>

        </div>
        <!-- Content -->
      </section>
      <!--Section: Jumbotron-->

      <hr class="my-5">

      <!--Section: Cards-->
      <section class="text-center">

        <!--Grid row-->
        <div class="row mb-4 wow fadeIn">

          <!--Grid column-->
          @foreach($articles as $article)
          <div class="col-lg-4 col-md-12 mb-4">

            <!--Card-->
            <div class="card" style="border-radius: 5px;">

              <!--Card image-->
              <div class="view overlay">
                <img src="{{ asset('article/'.$article->image) }}" class="card-img-top" height="320" style="border-radius: 4px;">
                <a href="https://mdbootstrap.com/education/tech-marketing/automated-app-introduction/" target="_blank">
                  <div class="mask rgba-white-slight"></div>
                </a>
                <lead class="float-left">{{ \Carbon\Carbon::parse($article->created_at)->format('d-M-Y') }} &nbsp;</lead>
              </div>
                <h4 class="card-title" style="height: 26px;">{{ \Illuminate\Support\Str::title($article->title) }}</h4>

              <!--Card content-->
              <div class="card-body text-left" style="height: 90px;">
                <!--Text-->
                <p class="card-text" style="font-size: 12px;">{!! Illuminate\Support\Str::words($article->content, 21) !!}</p>
              </div>
                <a href="{{ route('front.article.show', $article->slug) }}" class="btn btn-info col-md-12">Read more...</a>

            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->
        @endforeach
      </section>
      <!--Section: Cards-->

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small mdb-color darken-2 mt-4 wow fadeIn">

    <!-- <hr class="my-4"> -->

    {!! $articles->links() !!}

    <!-- Social icons -->
    <!-- <div class="pb-4">
      <a href="https://www.facebook.com/mdbootstrap" target="_blank">
        <i class="fab fa-facebook-f mr-3"></i>
      </a>

      <a href="https://twitter.com/MDBootstrap" target="_blank">
        <i class="fab fa-twitter mr-3"></i>
      </a>

      <a href="https://www.youtube.com/watch?v=7MUISDJ5ZZ4" target="_blank">
        <i class="fab fa-youtube mr-3"></i>
      </a>

      <a href="https://plus.google.com/u/0/b/107863090883699620484" target="_blank">
        <i class="fab fa-google-plus-g mr-3"></i>
      </a>

      <a href="https://dribbble.com/mdbootstrap" target="_blank">
        <i class="fab fa-dribbble mr-3"></i>
      </a>

      <a href="https://pinterest.com/mdbootstrap" target="_blank">
        <i class="fab fa-pinterest mr-3"></i>
      </a>

      <a href="https://github.com/mdbootstrap/bootstrap-material-design" target="_blank">
        <i class="fab fa-github mr-3"></i>
      </a>

      <a href="http://codepen.io/mdbootstrap/" target="_blank">
        <i class="fab fa-codepen mr-3"></i>
      </a>
    </div> -->
    <!-- Social icons -->

    <!--Copyright-->
    <div class="footer-copyright py-3" style="color: white;">
      <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank">© 2018 Copyright: MDBootstrap.com </a>
    </div>
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->
@endsection
