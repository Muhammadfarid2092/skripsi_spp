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
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="{{ route('group.index') }}" class="sidebar-link">
            <i class="bi bi-grid-fill"></i>
            <span>Group</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="{{ route('questionnaire.index') }}" class="sidebar-link">
            <i class="bi bi-grid-fill"></i>
            <span>Questionnaire</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="{{ route('question.index') }}" class="sidebar-link">
            <i class="bi bi-grid-fill"></i>
            <span>Question</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="{{ route('grade.index') }}" class="sidebar-link">
            <i class="bi bi-grid-fill"></i>
            <span>Grade</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a href="{{ route('user.index') }}" class="sidebar-link">
            <i class="bi bi-person-bounding-box"></i>
            <span>Olah Data User</span>
          </a>
        </li>

        {{-- <li class="sidebar-item has-sub">
            <a href="#" class="sidebar-link">
              <i class="bi bi-stack"></i>
              <span>Contoh Menu Dropdown</span>
            </a>
            <ul class="submenu">
              <li class="submenu-item">
                <a href="component-alert.html">Alert</a>
              </li>
              <li class="submenu-item">
                <a href="component-badge.html">Badge</a>
              </li>
            </ul>
          </li> --}}
      </ul>
    </div>
  </div>
</div>
