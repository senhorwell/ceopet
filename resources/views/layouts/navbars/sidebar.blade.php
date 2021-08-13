<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="/" class="simple-text logo-normal">
      <img src="{{ asset('img') }}/logo.svg" width="120px" height="40px"/>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      @guest()
        <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }} person-box d-flex align-items-center justify-content-center">
          <div class="col-9 person-bg">
            <a class="nav-link p-0 m-0" href="{{ route('profile.dados') }}">
              <div class="col-3 p-0">
                <i class="material-icons person">person</i>
              </div>
              <div class="col-6 p-0 d-flex flex-column text-left">
                <a class="m-0 p-0" href="{{ route('profile.dados')}}">Fazer Login</a>
              </div>
            </a>
          </div>
        </li>
      @endguest
      @auth()
      <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }} person-box d-flex align-items-center justify-content-center">
        <div class="col-9 person-bg">
          <a class="nav-link p-0 m-0" href="{{ route('profile.edit') }}">
            <div class="col-3 p-0">
              @if(file_exists('img/profile/'.auth()->user()->id . '.png')) 
                <img id="profile-pic" src="/img/profile/{{auth()->user()->id}}.png">
              @else
              <i class="material-icons person">person</i>
              @endif
            </div>
            <div class="col-6 p-0 d-flex flex-column text-left">
              <p>{{ auth()->user()->firstName() }}</p>
              <p>{{ auth()->user()->lastName() }}</p>
              <a class="m-0 p-0" href="{{ route('profile.edit')}}">Meus dados</a>
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
      @if (auth()->user()->admin == 3 || auth()->user()->admin == 2)
      <li class="nav-item{{ $activePage == 'atendimentoregistra' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('atendimento.registra') }}">
          <i class="material-icons">folder</i>
            <p>{{ __('Registrar Atendimento') }}</p>
        </a>
      </li>
      @endif
      <li class="nav-item{{ $activePage == 'atendimentoconsulta' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('atendimento.consulta') }}">
          <i class="material-icons">settings</i>
          <p>{{ __('Consultar Atendimento') }}</p>
        </a>
      </li>
      @if (auth()->user()->admin == 3)
        <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
          <a class="nav-link collapsed" data-toggle="collapse" href="#laravelExample" aria-expanded="false">
            <i class="material-icons">note_add</i>
            <p>{{ __('Cadastrar') }}
              <b class="caret"></b>
            </p>
          </a>
          <div class="collapse" id="laravelExample">
            <ul class="nav">
              <li class="nav-item{{ $activePage == 'credenciado.dados' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('credenciado.dados') }}">
                  <i class="material-icons">note_add</i>
                  <span class="sidebar-normal">{{ __('Credenciado') }} </span>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'tutor' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('tutor.dados') }}">
                  <i class="material-icons">note_add</i>
                <span class="sidebar-normal">{{ __('Tutor') }} </span>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'pet' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('paciente.registra.get') }}">
                  <i class="material-icons">note_add</i>
                  <span class="sidebar-normal">{{ __('Pet') }} </span>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('procedimento.registra') }}">
                  <i class="material-icons">note_add</i>
                  <span class="sidebar-normal"> {{ __('Procedimento') }} </span>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('plano.registra') }}">
                  <i class="material-icons">note_add</i>
                  <span class="sidebar-normal"> {{ __('Plano') }} </span>
                </a>
              </li>
              <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('banner.registra') }}">
                  <i class="material-icons">note_add</i>
                  <span class="sidebar-normal"> {{ __('Banner') }} </span>
                </a>
              </li>
            </ul>
          </div>
        </li>
      @endif
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
      @endauth()
    </ul>
  </div>
</div>