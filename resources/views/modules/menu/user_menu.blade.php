<ul class="navbar-nav ml-auto">
  @if (Auth::guest())
      <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
  @else

  <li class="nav-item dropdown">
    <a class="nav-link"
      href="#"
      role="button"
      data-toggle="dropdown"
      aria-haspopup="true"
      aria-expanded="false"
      onclick="$.post('{{route('notifications.clear')}}');">
      @php $unreadNotificationsCount= Auth::user()->unreadNotifications ->count(); @endphp
      @if ($unreadNotificationsCount > 0)
        <span class="badge badge-pill badge-danger">
          <i class="fa fa-bell" aria-hidden="true"></i>
          {{ $unreadNotificationsCount }}
        </span>
      @else
        <span class="badge badge-pill badge-secondary">
          <i class="fa fa-bell" aria-hidden="true"></i>
        </span>
      @endif
    </a>
    <div class="dropdown-menu" >
      @foreach (Auth::user()->notifications as $notification)
        @include('modules.notification')
      @endforeach


    </div>
  </li>



  <li class="nav-item dropdown pull-right">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{route('profile.show',Auth::id())}}">My Profile</a>
      <a class="dropdown-item" href="#">Another action</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item"
        href="{{ route('logout') }}"
        onclick="event.preventDefault();
         document.getElementById('logout-form').submit();">
          Logout
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
    </div>
  </li>
  @endif
</ul>
