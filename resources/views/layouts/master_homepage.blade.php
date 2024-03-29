<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sistem Penilaian Perilaku</title>
    <link rel="stylesheet" href="{{asset('mazer')}}/assets/css/main/app.css" />
    <link
      rel="shortcut icon"
      href="{{asset('mazer')}}/assets/images/logo/favicon.svg"
      type="image/x-icon"
    />
    <link
      rel="shortcut icon"
      href="{{asset('mazer')}}/assets/images/logo/favicon.png"
      type="image/png"
    />

    <link rel="stylesheet" href="{{asset('mazer')}}/assets/css/shared/iconly.css" />
    <link rel="stylesheet" href="{{asset('css')}}/style.css" />
  </head>

  <body>
    <script src="{{asset('mazer')}}/assets/js/initTheme.js"></script>

    <div id="app">
      <div class="container">
        @include('partial.navbar_homepage')
        <main>
          @yield('main')
        </main>
        @include('partial.footer')
      </div>
    </div>

    <!-- Daftar Javascript -->
    <script src="{{asset('mazer')}}/assets/js/bootstrap.js"></script>
    <script src="{{asset('mazer')}}/assets/js/app.js"></script> 
    <script src="{{asset('mazer')}}/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="{{asset('mazer')}}/assets/js/pages/dashboard.js"></script>
  </body>
</html>
