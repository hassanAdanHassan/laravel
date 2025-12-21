<ul class="navbar-nav ms-auto">


  <li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
      {{-- <img src="#" class="user-image rounded-circle shadow" alt="User Image" /> --}}
      <span class="d-none d-md-inline">Hassan</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
      <!--begin::User Image-->
      <li class="user-header text-bg-primary">
        <img src="#" class="rounded-circle shadow" alt="#" />
        <p>
          Hassan - Web Developer
          <small>Member since Nov. 2023</small>
        </p>
      </li>
      <!--end::User Image-->
      <!--begin::Menu Body-->
      <li class="user-body">
        <!--begin::Row-->
        <div class="row">
          <div class="col-4 text-center"><a href="#">Followers</a></div>
          <div class="col-4 text-center"><a href="#">Sales</a></div>
          <div class="col-4 text-center"><a href="#">Friends</a></div>
        </div>
        <!--end::Row-->
      </li>
      <!--end::Menu Body-->
      <!--begin::Menu Footer-->
      <li class="user-footer">
        <a href="#" class="btn btn-default btn-flat">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="dropdown-item">Sign out</button>
        </form>
      </li>
      <!--end::Menu Footer-->
    </ul>
  </li>
  <!--end::User Menu Dropdown-->
</ul>