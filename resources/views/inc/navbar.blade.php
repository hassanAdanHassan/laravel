<ul class="navbar-nav ms-auto">


  <li class="nav-item dropdown user-menu">
    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
      <img src="https://placehold.co/100" class="user-image rounded-circle shadow" alt="User Image" />
      <span class="d-none d-md-inline">{{Auth::user()->name}} </span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
      <!--begin::User Image-->
      <li class="user-header text-bg-primary">
        <img src="https://placehold.co/100" class="rounded-circle shadow" alt="#" />
        <p>
             {{ Auth::user()->name ?? "" }} -{{ Auth::user()->role ?? " " }}
          <small>Member since {{ Auth::user()->created_at->format('Y'.' '.'M') }} </small>
        </p>
      </li>
      <!--end::User Image-->
  
      <!--begin::Menu Footer-->
      <li>
                  <a href="{{ url('profile') }}" class="btn btn-default btn-flat">Profile</a>
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