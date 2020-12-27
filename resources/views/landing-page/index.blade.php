<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SMAN 1 PATIANROWO</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('landing-page/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="{{ asset('landing-page/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('landing-page/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{ asset('landing-page/css/landing-page.min.css') }}" rel="stylesheet">
  @yield('css')
  
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a href="nabar-brand" title=""><img src="{{ asset('dist/img/smapat.png') }}" alt="..." style="width: 50px; height: 50px;"></a>
      <a class="navbar-brand" href="#">Home</a>
      <a class="navbar-brand" href="/forum">Forum</a>
      <a class="navbar-brand" href="#">Galery</a>
      <a class="navbar-brand" href="#">Contact Us</a>
      <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <a href="https://www.sman1patianrowo.sch.id/" class="logo mr-auto"><img src="https://www.sman1patianrowo.sch.id/media_library/images/499122c64d7a4a9439ca3d09cb269770.png" alt="" class="img-fluid"></a>
          <br>
          <h1 class="mb-5" style="font-size: 54px;">SMA NEGERI 1 PATIANROWO</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-12 mb-2 mb-md-0">
                <h5>{{ $frontend->slogan }}</h5>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-users m-auto text-primary"></i>
            </div>
            <h3>{{ $frontend->students }}</h3>
            <p class="lead mb-0">Peserta Didik</p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-user-plus m-auto text-primary"></i>
            </div>
            <h3>{{ $frontend->educator }}</h3>
            <p class="lead mb-0">Pendidik</p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="fas fa-user-secret m-auto text-primary"></i>
            </div>
            <h3>{{ $frontend->teacher }}</h3>
            <p class="lead mb-0">Tenaga Kependidikan</p>
          </div>
        </div>
        <div class="col-lg-3">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-layers m-auto text-primary"></i>
            </div>
            <h3>{{ $frontend->course }}</h3>
            <p class="lead mb-0">Mata Pelajaran</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Image Showcases -->
  <section class="showcase">
    <div class="container-fluid p-0">
      <div class="row no-gutters">

    <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('https://www.silabus.web.id/wp-content/uploads/2018/04/Pengertian-Pendidikan-dan-Makna-Pendidikan-Menurut-Para-Ahli-626x352.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>{{ $frontend->content1_title }}</h2>
          <p class="lead mb-0">{{ $frontend->content1_body }}</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 text-white showcase-img" style="background-image: url('https://serupa.id/wp-content/uploads/2020/07/pendidikan-pengertian-unsur-jalur-jenjang-tujuan-fungsi-manfaat.jpg');"></div>
        <div class="col-lg-6 my-auto showcase-text">
          <h2>{{ $frontend->content2_title }}</h2>
          <p class="lead mb-0">U{{ $frontend->content2_body }}</p>
        </div>
      </div>
      <div class="row no-gutters">
        <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('https://koranntb.com/wp-content/uploads/2020/05/Ilustrasi-Pendidikan-IST.jpg');"></div>
        <div class="col-lg-6 order-lg-1 my-auto showcase-text">
          <h2>{{ $frontend->content3_title }}</h2>
          <p class="lead mb-0">{{ $frontend->content3_body }}</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonials -->
  <section class="testimonials text-center bg-light">
    <div class="container">
      <h2 class="mb-5">Profil Sekolah</h2>
      <div class="row">
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="http://foto2.data.kemdikbud.go.id/getImage/20538324/3.jpg" alt="" style="height: 200px; width: 200px;">
            <h5>{{ $frontend->profile1_title }}</h5>
            <p class="font-weight-light mb-0">{{ $frontend->profile1_body }}</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="https://www.sman1patianrowo.sch.id/media_library/images/5dd7d0c09187444238d08dc2d67b900e.png" alt="" style="height: 200px; width: 200px;">
            <h5>{{ $frontend->profile2_title }}</h5>
            <p>- Kepala Sekolah - </p>
            <p class="font-weight-light mb-0">{{ $frontend->profile2_body }}</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="testimonial-item mx-auto mb-5 mb-lg-0">
            <img class="img-fluid rounded-circle mb-3" src="{{ asset('dist/img/smapat.png') }}" alt="" style="height: 200px; width: 200px;">
            <h5>{{ $frontend->profile3_title }}</h5>
            <p class="font-weight-light mb-0">{{ $frontend->profile3_body }}</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call to Action -->
  <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <h1>Artikel</h1>
      <div class="row aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-lg-4 col-md-4 d-flex align-items-stretch" style="background-color:white; border-radius: 5px; margin-right: 40px;">
            <div class="course-item">
              <img src="https://www.sman1patianrowo.sch.id/media_library/posts/medium/ada850d66c3a50d7f1d7af397db3090a.jpg" class="img-fluid" alt="..." style="margin-top: 20px; height: 200px;">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <!-- <h4>Web Development</h4> -->
                  <p class="price" style="color:black;">28/05/2020 09:45</p>
                </div>

                <h3><a href="https://www.sman1patianrowo.sch.id/read/15/serah-terima-jabatan-kepala-sekolah">Serah Terima Jabatan Kepala Sekolah</a></h3>
                <p style="color: black;">Serah terima jabatan Kepala Sekolah baru dilaksanakan di Gedung Aula SMA Negeri 1 Gondang dengan disaksikan oleh Kepala Cabang Dinas Pendidikan Propinsi Jawa Timur</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="" style="margin-top: 20px;">
                    <span>Administrator</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-show-alt"></i>&nbsp;362</div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch " style="background-color:white; border-radius: 5px; margin-right: 40px;">
            <div class="course-item">
              <img src="https://www.sman1patianrowo.sch.id/media_library/posts/medium/d43094181a755c8bb52fd4ff96775752.jpg" class="img-fluid" alt="..." style="margin-top: 20px; height: 200px;">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <!-- <h4>Web Development</h4> -->
                  <p class="price" style="color:black;">14/05/2020 09:53</p>
                </div>

                <h3><a href="https://www.sman1patianrowo.sch.id/read/8/informasi-kelulusan-siswa-sman-1-patianrowo-tahun-2020">Informasi Kelulusan Siswa SMAN 1 Patianrowo Tahun 2020</a></h3>
                <p style="color: black;">Dinas Pendidikan Provinsi Jawa Timur telah mengeluarkan Surat Edaran tentang kelulusan siswa&nbsp;SMA Tahun Pelajaran 2019/2020, sehubungan dengan adanya pandemi cov</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                    <span>Administrator</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-show-alt"></i>&nbsp;321</div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->
          <div class="col-lg-4 col-md-6 d-flex align-items-stretch " style="background-color:white; border-radius: 5px;">
            <div class="course-item">
              <img src="https://www.sman1patianrowo.sch.id/media_library/posts/medium/e363bea8be063552714eb132caceb79a.jpg" class="img-fluid" alt="..." style="margin-top: 20px; height: 200px;-+">
              <div class="course-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <!-- <h4>Web Development</h4> -->
                  <p class="price" style="color:black;">16/03/2020 12:15</p>
                </div>

                <h3><a href="https://www.sman1patianrowo.sch.id/read/7/sosialisasi-unbk-dan-penandatanganan-pakta-integritas-sman-1-patianrowo-tahun-pelajaran-20192020">Sosialisasi UNBK dan Penandatanganan Pakta Integritas SMAN 1 Patianrowo Tahun Pelajaran 2019/2020</a></h3>
                <p style="color: black;">Patianrowo, 16 Maret 2020 – SMAN 1 Patianrowo mengadakan Sosialisasi UNBK 2020 dan penandatanganan pakta integritas tahun pelajaran 2019/2020. Kegiatan ini dii</p>
                <div class="trainer d-flex justify-content-between align-items-center">
                  <div class="trainer-profile d-flex align-items-center">
                    <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                    <span>Administrator</span>
                  </div>
                  <div class="trainer-rank d-flex align-items-center">
                    <i class="bx bx-show-alt"></i>&nbsp;275                  </div>
                </div>
              </div>
            </div>
          </div> <!-- End Course Item-->

        </div>
        
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">About</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Contact</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">Copyright &copy; <a href="https://adminlte.io">SMAN 1 PATIANROWO</a>. All Rights Reserved.</p>
        </div>
        <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
          <ul class="list-inline mb-0">
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-facebook fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item mr-3">
              <a href="#">
                <i class="fab fa-twitter-square fa-2x fa-fw"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-instagram fa-2x fa-fw"></i>
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
