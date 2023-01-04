<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>SISTEM PENILAIAN PERILAKU</title>
  <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/main/app.css" />
  <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/pages/auth.css" />
  <link rel="shortcut icon" href="{{ asset('mazer') }}/assets/images/logo/favicon.svg" type="image/x-icon" />
  <link rel="shortcut icon" href="{{ asset('mazer') }}/assets/images/logo/favicon.png" type="image/png" />
</head>

<body>
  <div id="auth">
    <div class="row h-100">
      <div class="col-lg-5 col-12">
        <div id="auth-left">
          <h1 class="auth-title">Selamat datang!</h1>
          <p class="auth-subtitle mb-5">Sistem Penilaian Perilaku</p>

          <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="text" class="form-control form-control-xl @error('nip_nis') is-invalid @enderror"
                placeholder="NIP / NIS" id="nip_nis" name="nip_nis" value="{{ old('nip_nis') }}" required
                autocomplete="nip_nis" autofocus />
              <div class="form-control-icon">
                <i class="bi bi-person"></i>
              </div>
            </div>
            @error('nip_nis')
              @include('partial.invalid-form', ['message' => $message])
            @enderror
            <div class="form-group position-relative has-icon-left mb-4">
              <input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror"
                placeholder="Password" id="password" name="password" value="{{ old('password') }}" required
                autocomplete="password" autofocus />
              <div class="form-control-icon">
                <i class="bi bi-shield-lock"></i>
              </div>
            </div>
            @error('password')
              @include('partial.invalid-form', ['message' => $message])
            @enderror
            <div class="form-check form-check-lg d-flex align-items-end"></div>
            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
              Log in
            </button>
          </form>
          <div class="text-center mt-5 text-lg fs-4">
            <p class="text-gray-600">
              Sistem Penilaian Perilaku Siswa Online
              <a href="{{ route('homepage') }}" class="font-bold">Kembali</a>.
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right"></div>
      </div>
    </div>
  </div>
</body>

</html>
