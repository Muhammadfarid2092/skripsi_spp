<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Template Mo">
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

  <title>SISTEM PENILAIAN PERILAKU</title>

  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="assets/css/templatemo-art-factory.css">
  <link rel="stylesheet" type="text/css" href="assets/css/owl-carousel.css">
  <link rel="stylesheet" href="{{asset('css')}}/style.css" />

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->


  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="{{ route('homepage') }}" class="logo">UIN SUKA</a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="{{ route('homepage') }}">Home</a></li>
              <li class="scroll-to-section"><a href="{{ route('contact') }}">Contact</a></li>
              <li class="scroll-to-section"><a href="{{ route('about') }}">About</a></li>
              @if (Auth::check())
                <div class="dropdown">
                  <span class="dropdown-toggle dropdown-homepage" type="button" data-toggle="dropdown" aria-expanded="false">
                    Hi, {{ ucwords(Auth::user()->nama) }}
                  </span>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('dashboard.index') }}">Dashboard</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                      onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                  </div>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              @else
                <li class="scroll-to-section"><a href="{{ route('login') }}">Login</a></li>
              @endif
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->


  <!-- ***** Welcome Area Start ***** -->
  <div class="welcome-area" id="welcome">

    <!-- ***** Header Text Start ***** -->
    <div class="header-text">
      <div class="container">
        <div class="row">
          <div class="left-text col-lg-6 col-md-6 col-sm-12 col-xs-12"
            data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
            <h4>Selamat Datang <br> SISTEM PENILAIAN PERILAKU SISWA ONLINE</h4>
            <p>Kuesioner kini bisa dilakukan dimana saja, kapan saja, secara online, tanpa perlu kertas</p>
            <a href="{{ route('login') }}" class="main-button-slider">Ikut Kuesioner Sekarang!</a>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12"
            data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
            <img src="assets/images/slider-icon.png" class="rounded img-fluid d-block mx-auto"
              alt="First Vector Graphic">
          </div>
        </div>
      </div>
    </div>
    <!-- ***** Header Text End ***** -->
  </div>
  <!-- ***** Welcome Area End ***** -->


  <!-- ***** Features Big Item Start ***** -->
  <section class="section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-12 col-sm-12" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
          <img src="assets/images/left-image.png" class="rounded img-fluid d-block mx-auto" alt="App">
        </div>
        <div class="right-text col-lg-5 col-md-12 col-sm-12 mobile-top-fix">
          <div class="left-heading">
            <h5>Metode Multi-Source Feedback</h5>
          </div>
          <div class="left-text">
            <p>Multi Source Feedback adalah penilaian ini dirasakan cukup</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="hr"></div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Features Big Item End ***** -->

  <!-- ***** Footer Start ***** -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-7 col-md-12 col-sm-12">
          <p>SMAN 2 Banguntapan</p>
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12">
          <ul class="social">
            <p class="copyright">Copyright &copy; 2022 Muhammad Farid Hafizhuddin
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- jQuery -->
  <script src="assets/js/jquery-2.1.0.min.js"></script>

  <!-- Bootstrap -->
  <script src="assets/js/popper.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>

  <!-- Plugins -->
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/scrollreveal.min.js"></script>
  <script src="assets/js/waypoints.min.js"></script>
  <script src="assets/js/jquery.counterup.min.js"></script>
  <script src="assets/js/imgfix.min.js"></script>

  <!-- Global Init -->
  <script src="assets/js/custom.js"></script>
  <script src="js/index.js"></script>

</body>

</html>
