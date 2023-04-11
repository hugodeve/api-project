<div class="sidebar" data-color="purple" data-background-color="white">
  <div class="logo pb-0 pt-2">
    <div class="text-center text-muted small font-italic">Smart Control</div>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      @can('home')
      <li class="nav-item {{ $activePage == 'dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
          <p>{{ __('Painel') }}</p>
        </a>
      </li>
      @endcan

      @can('logout')
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          <i class="fa-solid fa-right-from-bracket"></i>
          <p>{{ __('Salir') }}</p>
        </a>
      </li>
      @endcan
    </ul>
   
  </div>
</div>
