@extends('layouts.app', ['activePage' => 'consultapaciente', 'titlePage' => __('Meus Dados')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('profile.registrar.paciente') }}" autocomplete="off" class="form-horizontal">
            @csrf
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
                  <h1 class="title-card pr-4">Cadastrar credenciado</h1>
                  <p class="p-0 m-0">Aqui você pode cadastrar o credenciado</p>
                </div>
                <div class="mt-5 align-items-center">
                  <h1 class="title-card pr-4">Dados do credenciado</h1>
                </div>
                <div class="row col-12 p-0">
                  <div class="d-flex flex-column col-6">
                    <label class="form-label">{{ __('Nome do credenciado') }}</label>
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Xxxxxxxxxxxxxxx') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-6">
                    <label class="form-label">{{ __('Nome fantasia') }}</label>
                    <div class="form-group{{ $errors->has('fantasia') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('fantasia') ? ' is-invalid' : '' }}" name="fantasia" id="input-fantasia" type="text" placeholder="{{ __('Xxxxxxxxxxx') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('raca'))
                        <span id="raca-error" class="error text-danger" for="input-fantasia">{{ $errors->first('fantasia') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row col-12 p-0">
                  <div class="d-flex flex-column col-6">
                    <label class="form-label">{{ __('CNPJ') }}</label>
                    <div class="form-group{{ $errors->has('cnpj') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('cnpj') ? ' is-invalid' : '' }}" name="cnpj" id="input-cnpj" type="text" placeholder="{{ __('XXXXXXXXXXXXXXXXXXXXX') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('cnpj'))
                        <span id="cnpj-error" class="error text-danger" for="input-cnpj">{{ $errors->first('cnpj') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-2">
                    <label class="form-label">{{ __('Telefone') }}</label>
                    <div class="form-group{{ $errors->has('phone') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" id="input-phone" type="text" placeholder="{{ __('(XX) XXXXX-XXXX') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('phone'))
                        <span id="phone-error" class="error text-danger" for="input-phone">{{ $errors->first('phone') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-4">
                    <label class="form-label">{{ __('E-mail') }}</label>
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('XXXXXXX@XXXX.XXX') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row col-12 p-0">
                  <div class="d-flex flex-column col-6">
                    <label class="form-label">{{ __('Endereço') }}</label>
                    <div class="form-group{{ $errors->has('endereco') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('endereco') ? ' is-invalid' : '' }}" name="endereco" id="input-endereco" type="text" placeholder="{{ __('R. Goias') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('endereco'))
                        <span id="endereco-error" class="error text-danger" for="input-endereco">{{ $errors->first('endereco') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-2">
                    <label class="form-label">{{ __('CEP') }}</label>
                    <div class="form-group{{ $errors->has('cep') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('cep') ? ' is-invalid' : '' }}" name="cep" id="input-cep" type="text" placeholder="{{ __('XXXXX-XXX') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('cep'))
                        <span id="cep-error" class="error text-danger" for="input-cep">{{ $errors->first('cep') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-2">
                    <label class="form-label">{{ __('Numero') }}</label>
                    <div class="form-group{{ $errors->has('numero') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('numero') ? ' is-invalid' : '' }}" name="numero" id="input-numero" type="text" placeholder="{{ __('123') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('numero'))
                        <span id="numero-error" class="error text-danger" for="input-numero">{{ $errors->first('numero') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-2">
                    <label class="form-label">{{ __('Complemento') }}</label>
                    <div class="form-group{{ $errors->has('complemento') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('complemento') ? ' is-invalid' : '' }}" name="complemento" id="input-complemento" type="text" placeholder="" required="true" aria-required="true"/>
                      @if ($errors->has('complemento'))
                        <span id="complemento-error" class="error text-danger" for="input-complemento">{{ $errors->first('complemento') }}</span>
                      @endif
                    </div>
                  </div>
                </div>


                
                <div class="row col-12 p-0">
                  <div class="d-flex flex-column col-5">
                    <label class="form-label">{{ __('Bairro') }}</label>
                    <div class="form-group{{ $errors->has('bairro') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('bairro') ? ' is-invalid' : '' }}" name="bairro" id="input-bairro" type="text" placeholder="{{ __('Centro') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('bairro'))
                        <span id="bairro-error" class="error text-danger" for="input-bairro">{{ $errors->first('bairro') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-5">
                    <label class="form-label">{{ __('Cidade') }}</label>
                    <div class="form-group{{ $errors->has('cidade') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('cidade') ? ' is-invalid' : '' }}" name="cidade" id="input-cidade" type="text" placeholder="{{ __('Londrina') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('cidade'))
                        <span id="cidade-error" class="error text-danger" for="input-cidade">{{ $errors->first('cidade') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-2">
                    <label class="form-label">{{ __('Estado') }}</label>
                    <div class="form-group{{ $errors->has('estado') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}" name="estado" id="input-estado" type="text" placeholder="{{ __('Parana') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('estado'))
                        <span id="estado-error" class="error text-danger" for="input-estado">{{ $errors->first('estado') }}</span>
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