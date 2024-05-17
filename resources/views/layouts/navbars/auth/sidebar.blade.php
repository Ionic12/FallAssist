
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 shadow" style="background-color: white" id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center justify-content-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
        <img src="../assets/img/monitoring.png" class="navbar-brand-img h-100" alt="...">
        <span class="ms-3 font-weight-bold">FallAssist Dasboard</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboard') || Request::is('medical-records') || Request::is('/') || Request::is('edit-medical-records') || Request::is('add-connected-contact') || Request::is('edit-connected-contact-*') ? 'active' : '') }}" href="{{ url('dashboard') }}">
          <div style="background-color: #4A3AFF" class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-home fa-xl opacity-10" style="font-size:14px; padding-bottom:3px;color: #ffffff;"></i>
          </div>
          <span class="nav-link-text ms-1">Dashboard</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('user-management') || Request::is('search-user')  ? 'active' : '') }}" href="{{ url('user-management') }}">
          <div style="background-color: #4A3AFF" class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-bars-progress fa-xl opacity-10" style="font-size:15px; padding-bottom:4px;color: #ffffff;"></i>
          </div>
          <span class="nav-link-text ms-1">User Management</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('contact-management') || Request::is('search-contact') ? 'active' : '') }}" href="{{ url('contact-management') }}">
          <div style="background-color: #4A3AFF" class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-address-book fa-xl opacity-10" style="font-size:15px; padding-bottom:3px;color: #ffffff;"></i>
          </div>
          <span class="nav-link-text ms-1">Contact Management</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('devices-management') ? 'active' : '') }}" href="{{ url('devices-management') }}">
          <div style="background-color: #4A3AFF" class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-microchip fa-xl opacity-10" style="font-size:15px; padding-bottom:3px;color: #ffffff;"></i>
          </div>
          <span class="nav-link-text ms-1">Devices Management</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('/logout')}} ">
          <div style="background-color: #4A3AFF" class="icon icon-shape icon-sm shadow border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fa-solid fa-right-from-bracket fa-xl opacity-10" style="font-size:15px; padding-bottom:3px;padding-left:2px;color: #ffffff;"></i>
          </div>
          <span class="nav-link-text ms-1">Sign Out</span>
        </a>
      </li>
    </ul>
  </div>
</aside>
