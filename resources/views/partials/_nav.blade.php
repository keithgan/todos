<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Vue Todos</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="nav navbar-nav ml-auto">
      @if (Auth::check())
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Hello {{ Auth::user()->name }}</a>
        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
        </div>
      </li>
      @else
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav navbar-nav">
          <li class="nav-item">
              <a href="{{ route('login') }}" class='btn btn-default'>Login</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('register') }}" class='btn btn-default'>Register</a>
        </li>
        </ul>
      </div>
      @endif
    </ul>
  </div>
</nav>