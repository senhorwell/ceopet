@extends('layouts.app', ['activePage' => 'consultapaciente', 'titlePage' => __('Consultar Paciente')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('paciente.registra') }}" autocomplete="off" class="form-horizontal">
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
                <div class="d-inline-flex align-items-center">
                  <h1 class="title-card pr-4">Dados do Paciente</h1>
                  <p class="p-0 m-0">Aqui você pode registrar o paciente a ser atendido</p>
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
                    <label class="form-label">{{ __('Espécie') }}</label>
                    <div class="form-group{{ $errors->has('especie') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('especie') ? ' is-invalid' : '' }}" name="especie" id="input-especie" type="text" placeholder="{{ __('Gato') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('especie'))
                        <span id="especie-error" class="error text-danger" for="input-especie">{{ $errors->first('especie') }}</span>
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
                    <label class="form-label">{{ __('Aniversário') }}</label>
                    <div class="form-group{{ $errors->has('') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('aniversario') ? ' is-invalid' : '' }}" name="aniversario" id="input-aniversario" type="month" value="" required="true" aria-required="true"/>
                      @if ($errors->has('aniversario'))
                        <span id="aniversario-error" class="error text-danger" for="input-aniversario">{{ $errors->first('aniversario') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Nº microchip') }}</label>
                    <div class="form-group{{ $errors->has('microchip') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('microchip') ? ' is-invalid' : '' }}" name="microchip" id="input-microchip" type="text" placeholder="{{ __('000.0000.000000') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('microchip'))
                        <span id="microchip-error" class="error text-danger" for="input-microchip">{{ $errors->first('microchip') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Plano') }}</label>
                    <div class="form-group{{ $errors->has('plano') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('plano') ? ' is-invalid' : '' }}" name="plano" id="input-plano" required="true" aria-required="true">
                        <option value="0" selected> Selecione uma opção</option>
                        @foreach($planos as $plano)
                          <option value="{{$plano->id}}">{{$plano->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Nome do Responsável') }}</label>
                    <div class="form-group{{ $errors->has('dono_name') ? ' has-danger' : '' }}">
                      <input type="hidden" id="dono_id" value=""/>
                      <select class="form-control{{ $errors->has('dono') ? ' is-invalid' : '' }}" name="dono" id="input-dono" required="true" aria-required="true">
                        <option value="0" selected> Selecione uma opção</option>
                        @foreach($credenciados as $credenciado)
                          <option value="{{$credenciado->id}}">{{$credenciado->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <div class="d-flex flex-column col-3 p-0">
                  <a id="status-box" onClick="setNewStatus()" class="d-none align-items-center justify-content-center" href="#">
                    <p id="ativo" class="ativo m-0 d-none">Cliente ativo</p>
                    <p id="inativo" class="m-0 d-none">Cliente inativo</p>
                  </a>
                  <input id="status" type="hidden" name="status" value="">
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