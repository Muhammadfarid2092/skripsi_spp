<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header position-relative">
      <div class="d-flex justify-content-center align-items-center">
        <div class="logo">
          <a href="{{ route('dashboard.index') }}">
            <h5>SMAN 2 Banguntapan</h5>
          </a>
        </div>
        <div class="sidebar-toggler x">
          <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
        </div>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-title fw-bold google-red">Menu</li>

        <li class="sidebar-item">
          <a href="{{ route('dashboard.index') }}" class="sidebar-link google-yellow">
            <i class="bi bi-house-door google-yellow"></i>
            <span>Halaman Dashboard</span>
          </a>
        </li>
        @if (Auth::user()->role == 'guru' || Auth::user()->role == 'admin')
        <li class="sidebar-item">
          <a href="{{ route('group.index') }}" class="sidebar-link google-green">
            <i class="bi bi-people-fill google-green"></i>
            <span>Olah Data Grup</span>
          </a>
        </li>
        @endif
        <li class="sidebar-item has-sub">
          <a href="#" class="sidebar-link google-blue">
            <i class="bi bi-question-square google-blue"></i>
            <span>Daftar Pertanyaan</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              @if (Auth::user()->role == 'guru' || Auth::user()->role == 'admin')
              <a href="{{ route('question.index') }}">Pertanyaan</a>
              @endif
              @if (Auth::user()->role == 'siswa')
              <a href="{{ route('grade.create') }}">Kuesioner Penilaian</a>
              @endif
            </li>
          </ul>
        </li>
        <li class="sidebar-item has-sub">
          <a href="#" class="sidebar-link google-red">
            <i class="bi bi-award google-red"></i>
            <span>Penilaian</span>
          </a>
          <ul class="submenu">
            @if (Auth::user()->role == 'siswa')
            <li class="submenu-item">
              <a href="{{ route('grade.index') }}">Hasil Nilai Siswa</a>
            </li>
            @endif
            @if (Auth::user()->role == 'guru' || Auth::user()->role == 'admin')
            <li class="submenu-item">
              <a href="{{ route('grade.create_teacher') }}">Form Input Nilai Guru</a>
            </li>
            <li class="submenu-item">
              <a href="{{ route('grade.index_teacher') }}">Hasil Semua Nilai Siswa</a>
            </li>
            @endif
          </ul>
        </li>
        @if (Auth::user()->role == 'admin')
        <li class="sidebar-item">
          <a href="{{ route('user.index') }}" class="sidebar-link google-yellow">
            <i class="bi bi-person-bounding-box google-yellow"></i>
            <span>Olah Data User</span>
          </a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</div>
