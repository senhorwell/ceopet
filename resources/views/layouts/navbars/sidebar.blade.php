<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      <img src="{{ asset('img') }}/logo.svg" width="120px" height="40px"/>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
    <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }} person-box d-flex align-items-center justify-content-center">
        <div class="col-9 person-bg">
          <a class="nav-link p-0 m-0" href="{{ route('profile.dados') }}">
            <div class="col-3 p-0">
              <i class="material-icons person">person</i>
            </div>
            <div class="col-6 p-0 d-flex flex-column text-left">
              <p>Luiz Felipe</p>
              <p>Designer</p>
              <a class="m-0 p-0" href="{{ route('profile.dados')}}">Meus dados</a>
            </div>
          </a>
        </div>

      </li>
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">home</i>
            <p>{{ __('Home') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'paciente' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('paciente.consulta') }}">
          <i class="material-icons">volunteer_activism</i>
            <p>{{ __('Consultar Paciente') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'atendimentoregistra' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('atendimento.registra') }}">
          <i class="material-icons">folder</i>
            <p>{{ __('Registrar Atendimento') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'atendimentoconsulta' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('atendimento.consulta') }}">
          <i class="material-icons">settings</i>
          <p>{{ __('Consultar Atendimento') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('profile.edit') }}">
          <i class="material-icons">autorenew</i>
            <p>{{ __('Alterar Senha') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'logout' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="material-icons">logout</i>
          <p>{{ __('Sair') }}</p>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
      </li>
    </ul>
  </div>
</div>
