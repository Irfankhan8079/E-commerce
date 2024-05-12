<nav class="navbar navbar-expand-lg  ">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">E-Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Authentication Links -->
        <li class="nav-item">
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="{{ url('/')}}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('category') ? 'active' : '' }}" href="{{ url('category')}}">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('cart') ? 'active' : '' }}" href="{{ url('cart')}}" style="position: relative;">
            <i class="bi bi-bag" style="font-size: 24px; font-weight: bold;"></i>
            <span class="badge badge-pill bg-primary cart-count" style="color: white; font-size: 12px; position: absolute; bottom: 4px; left: 23px;">0</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('wishlist') ? 'active' : '' }}" href="{{ url('wishlist')}}" style="position: relative;">
            <i class="bi bi-heart d-icon-heart" style="font-size: 24px; font-weight: bold;"></i>
            <span class="badge badge-pill bg-success wishlist-count" style="color: white; font-size: 12px; position: absolute; bottom: 4px; left: 20px;">0</span>
          </a>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item">
          <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown {{ Auth::check() ? 'active' : '' }}">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item {{ Request::is('my-orders') ? 'active' : '' }}" href="{{ url('my-orders')}}">
              My Orders
            </a>
            <a class="dropdown-item" href="">
              My Profile
            </a>
            <a class="dropdown-item {{ Request::is('logout') ? 'active' : '' }}" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>