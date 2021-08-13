@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Material Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1>Bem-vindo ao Sistema PET</h1>
            <form class="form" method="POST" action="{{ route('register') }}">
              @csrf

              <div class="card card-login card-hidden mb-3">
                <div class="card-body ">
                  <div class="bmd-form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">face</i>
                        </span>
                      </div>
                      <input type="text" name="name" class="form-control" placeholder="{{ __('Nome...') }}" value="{{ old('name') }}" required>
                    </div>
                    @if ($errors->has('name'))
                      <div id="name-error" class="error text-danger pl-3" for="name" style="display: block;">
                        <strong>{{ $errors->first('name') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }} mt-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">email</i>
                        </span>
                      </div>
                      <input type="email" name="email" class="form-control" placeholder="{{ __('Email...') }}" value="{{ old('email') }}" required>
                    </div>
                    @if ($errors->has('email'))
                      <div id="email-error" class="error text-danger pl-3" for="email" style="display: block;">
                        <strong>{{ $errors->first('email') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="bmd-form-group{{ $errors->has('foto') ? ' has-danger' : '' }} mt-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">photo</i>
                        </span>
                      </div>
                      <input type="file" name="image" class="form-control">
                    </div>
                    @if ($errors->has('foto'))
                      <div id="foto-error" class="error text-danger pl-3" for="foto" style="display: block;">
                        <strong>{{ $errors->first('foto') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Senha...') }}" required>
                    </div>
                    @if ($errors->has('password'))
                      <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                        <strong>{{ $errors->first('password') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="bmd-form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }} mt-3">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="material-icons">lock_outline</i>
                        </span>
                      </div>
                      <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="{{ __('Confirmar Senha...') }}" required>
                    </div>
                    @if ($errors->has('password_confirmation'))
                      <div id="password_confirmation-error" class="error text-danger pl-3" for="password_confirmation" style="display: block;">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="bmd-form-group{{ $errors->has('level') ? ' has-danger' : '' }}">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                            <i class="material-icons">leaderboard</i>
                        </span>
                      </div>
                      <select class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" id="input-level" required="true" aria-required="true">
                        <option value="0" selected> Selecione uma opção</option>
                        <option value="1">Secretariado</option>
                        <option value="2">Médico</option>
                        <option value="3">Administrador</option>
                      </select>
                    </div>
                    @if ($errors->has('level'))
                      <div id="level-error" class="error text-danger pl-3" for="level" style="display: block;">
                        <strong>{{ $errors->first('level') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="form-check mr-auto ml-3 mt-3">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" id="policy" name="policy" {{ old('policy', 1) ? 'checked' : '' }} >
                      <span class="form-check-sign">
                        <span class="check"></span>
                      </span>
                      {{ __('Eu aceito os termos de ') }} <a href="#">{{ __('Politicas de Privacidade') }}</a>
                    </label>
                  </div>
                </div>
                <div class="card-footer justify-content-center">
                  <button type="submit" class="btn btn-primary btn-link btn-lg">{{ __('Criar conta') }}</button>
                </div>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush