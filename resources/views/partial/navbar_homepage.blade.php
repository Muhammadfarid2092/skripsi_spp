<div class="header d-flex justify-content-between">
  {{-- ini sebelah kiri --}}
  <div>
    <h4>SISTEM INFORMASI PENILAIAN PERILAKU</h4>
    <p>Penilaian Perilaku di SMAN 2 Banguntapan</p>
  </div>

  {{-- ini sebelah kanan --}}
  <div>
    <a href="{{ route('homepage') }}" class="btn btn-secondary rounded-pill">Home</a>
    <a href="{{ route('contact') }}" class="btn btn-secondary rounded-pill">Contact</a>
    <a href="{{ route('about') }}" class="btn btn-secondary rounded-pill">About</a>
    @if (Auth::check())
    <div class="btn-group me-1 mb-1">
      <div class="dropdown">
        <button type="button" class="btn btn-secondary dropdown-toggle rounded-pill" data-bs-toggle="dropdown" aria-haspopup="true"
          aria-expanded="false">
          Hi, {{ ucwords(Auth::user()->nama) }}
        </button>
        <div class="dropdown-menu dropdown-menu-end">
          <a class="dropdown-item" href="{{ route('dashboard.index') }}">Dashboard</a>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
        </div>
      </div>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
      </form>
    </div>
    @else
      <a href="{{ route('login') }}" class="btn btn-secondary rounded-pill">Login</a>
    @endif
  </div>
</div>
