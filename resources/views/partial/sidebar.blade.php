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
        <li class="sidebar-title">Menu</li>

        <li class="sidebar-item">
          <a href="{{ route('dashboard.index') }}" class="sidebar-link">
            <i class="bi bi-house-door"></i>
            <span>Halaman Dashboard</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="{{ route('group.index') }}" class="sidebar-link">
            <i class="bi bi-people-fill"></i>
            <span>Olah Data Grup</span>
          </a>
        </li>
        <li class="sidebar-item has-sub">
          <a href="#" class="sidebar-link">
            <i class="bi bi-question-square"></i>
            <span>Olah Data Pertanyaan</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="{{ route('question.index') }}">Daftar Pertanyaan</a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a href="{{ route('grade.index') }}" class="sidebar-link">
            <i class="bi bi-award"></i>
            <span>Penilaian</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="{{ route('user.index') }}" class="sidebar-link">
            <i class="bi bi-person-bounding-box"></i>
            <span>Olah Data User</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</div>
