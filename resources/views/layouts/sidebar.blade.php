  <nav id="sidebarMenu" class="col-3 d-md-block sidebar collapse position-fixed">
    <a href="/"><img src="{{ asset('storage/layout/logo-wannaone-1.png') }}" height="25px" style="margin-top: 10px; margin-bottom: 40px"></a>
    <div class="position-sticky sidebar-sticky sidebarMenu">
      <ul class="nav flex-column sidebarMenu-content">
        <li class="nav-item">
          <a class="nav-link {{ $title == 'Home' ? 'active' : '' }}" aria-current="page" href="/forum">
            <span data-feather="home" class="align-text-bottom"></span>
            <i class="bi bi-house-door-fill"></i> Home
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ $title == Auth::user()->name ? 'active' : '' }}" href="/{{ Auth::user()->username }}">
            <span data-feather="file-text" class="align-text-bottom"></span>
            <i class="bi bi-person"></i> Profile
          </a>
        </li>
        <button class="sidebar-logout">
          <a  href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
          </a>
        </button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
      </ul>

      @can('admin')
      <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
        <span>Administrator</span>
      </h6>

      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/categories*') ? 'active' : '' }}" href="/dashboard/categories">
            <span data-feather="grid" class="align-text-bottom"></span>
            Post Categories
          </a>
        </li>
      </ul>
      @endcan

    </div>
  </nav>