@extends('landing-page.index')

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
          <a href="/articles" class="btn btn-default btn-sm">
            <i class="fas fa-arrow-left ml-2"> Back To Article </i>
          </a>
          <hr>
          @foreach($categories as $category)
            <a href="{{ route('category.article', $category->name) }}" class="btn btn-sm btn-primary"> {{ $category->name }} </a>
          @endforeach
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
            <div class="card">

              <!--Card image-->
              <div class="view overlay">
                <img src="{{ asset('article/'.$article->image) }}" class="card-img-top" height="200">
                <a href="https://mdbootstrap.com/education/tech-marketing/automated-app-introduction/" target="_blank">
                  <div class="mask rgba-white-slight"></div>
                </a>
                <lead class="float-right">{{ \Carbon\Carbon::parse($article->created_at)->format('d-M-Y') }} &nbsp;</lead>
              </div>

              <!--Card content-->
              <div class="card-body" style="height: 270px;">
                <!--Title-->
                <h4 class="card-title" style="height: 60px;">{{ $article->title }}</h4>
                <!--Text-->
                <p class="card-text">{!! Illuminate\Support\Str::words($article->content, 25) !!}</p>
                <br>
              </div>
              <div class="card-footer">
                <a href="{{ route('front.article.show', $article->slug) }}" class="btn btn-info">Lanjukan baca...</a>
              </div>

            </div>
            <!--/.Card-->

          </div>
          <!--Grid column-->
        @endforeach
      </div>
      </section>
      <!--Section: Cards-->

    </div>
  </main>
  <!--Main layout-->

  <!--Footer-->
  <footer class="page-footer text-center font-small mdb-color darken-2 mt-4 wow fadeIn">
    <!--Copyright-->
    <div class="footer-copyright py-3" style="color: white;">
      <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank">© 2018 Copyright: MDBootstrap.com </a>
    </div>
    <!--/.Copyright-->
  </footer>
  <!--/.Footer-->
@endsection

@section('js')
<script>
  new WOW().init();
</script>
@endsection