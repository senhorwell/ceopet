@extends('layouts.app', ['activePage' => 'consultapaciente', 'titlePage' => __('Consultar Paciente')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="get" action="{{ route('home') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row align-items-center">
                  <h1 class="title pr-4">Dados do Paciente</h1>
                  <p>Aqui você pode escolher o paciente a ser atendido</p>
                </div>
                <div class="row">
                  <label class="col-12 col-form-label">{{ __('Selecione um Paciente') }}</label>
                  <div class="col-12">
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" required="true" aria-required="true">
                        <option value="1" selected>Aisha - Danila Soares Zandona</option>
                        <option value="2">Fluph - Danila Soares Zandona</option>
                        <option value="3">Pingo - Danila Soares Zandona</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row col-12 p-0">
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Nome do Paciente') }}</label>
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Aisha') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Raça') }}</label>
                    <div class="form-group{{ $errors->has('raca') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('raca') ? ' is-invalid' : '' }}" name="raca" id="input-raca" type="text" placeholder="{{ __('Splitz') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('raca'))
                        <span id="raca-error" class="error text-danger" for="input-raca">{{ $errors->first('raca') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Plano') }}</label>
                    <div class="form-group{{ $errors->has('plano') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('plano') ? ' is-invalid' : '' }}" name="plano" id="input-plano" type="text" placeholder="Vip Gold" value="" required="true" aria-required="true"/>
                      @if ($errors->has('plano'))
                        <span id="plano-error" class="error text-danger" for="input-plano">{{ $errors->first('plano') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Nome do Responsável') }}</label>
                    <div class="form-group{{ $errors->has('dono_name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('dono_name') ? ' is-invalid' : '' }}" name="dono_name" id="input-dono_name" type="text" placeholder="Danila" value="" required="true" aria-required="true"/>
                      @if ($errors->has('dono_name'))
                        <span id="dono_name-error" class="error text-danger" for="input-dono_name">{{ $errors->first('dono_name') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="card ">
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row align-items-center">
                  <h1 class="title pr-4">Dados do Atendimento</h1>
                </div>
                <div class="row col-12 p-0">
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Procedimento') }}</label>
                    <div class="form-group{{ $errors->has('procedimento') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('procedimento') ? ' is-invalid' : '' }}" name="procedimento" id="input-procedimento" type="text" placeholder="{{ __('Aisha') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('procedimento'))
                        <span id="procedimento-error" class="error text-danger" for="input-procedimento">{{ $errors->first('procedimento') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Quantidade') }}</label>
                    <div class="form-group{{ $errors->has('qtd') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('qtd') ? ' is-invalid' : '' }}" name="qtd" id="input-qtd" type="text" placeholder="{{ __('2') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('qtd'))
                        <span id="qtd-error" class="error text-danger" for="input-qtd">{{ $errors->first('qtd') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Usuário') }}</label>
                    <div class="form-group{{ $errors->has('usuario') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('usuario') ? ' is-invalid' : '' }}" name="usuario" id="input-usuario" type="text" placeholder="Vip Gold" value="" required="true" aria-required="true"/>
                      @if ($errors->has('usuario'))
                        <span id="usuario-error" class="error text-danger" for="input-usuario">{{ $errors->first('usuario') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Empresa') }}</label>
                    <div class="form-group{{ $errors->has('empresa') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('empresa') ? ' is-invalid' : '' }}" name="empresa" id="input-empresa" type="text" placeholder="Danila" value="" required="true" aria-required="true"/>
                      @if ($errors->has('empresa'))
                        <span id="empresa-error" class="error text-danger" for="input-empresa">{{ $errors->first('empresa') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row col-12">
                  <div class="d-flex flex-column w-100">
                      <label class="form-label">{{ __('Observações') }}</label>
                      <div class="form-group{{ $errors->has('obs') ? ' has-danger' : '' }}">
                        <textarea class="form-control{{ $errors->has('obs') ? ' is-invalid' : '' }}" name="obs" id="input-obs" value="" rows="1" required="true" aria-required="true"></textarea>
                        @if ($errors->has('obs'))
                          <span id="obs-error" class="error text-danger" for="input-obs">{{ $errors->first('obs') }}</span>
                        @endif
                      </div>
                    </div>
                </div>
              </div>
              <div class="card-footer ml-auto">
                <button type="submit" class="btn btn-primary">{{ __('Confirmar') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection