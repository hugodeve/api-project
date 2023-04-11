<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-color nav-front bg-primary">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
    <span class="sr-only">Toggle navigation</span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
     <ul class="navbar-nav bg-white rounded-circle" style="height: 40px;width: 40px;color: #999;flex-direction: column;">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p class="d-lg-none d-md-block">
              {{ __('Account') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Sair') }}</a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="bg-primary pb-5 position-relative">
  <div class="row align-items-center mx-0">
    <h3 class="col col-12 text-white m-0 px-4">
      <strong>@yield('subheaderTitle', 'Adicionar Clientes')</strong>
    </h3>
  </div>
</div>
