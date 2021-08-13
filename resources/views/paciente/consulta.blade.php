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
                  <p class="p-0 m-0">Aqui você pode escolher o paciente a ser atendido</p>
                </div>
                <div class="row">
                  <label class="col-12 col-form-label">{{ __('Selecione um Paciente') }}</label>
                  <div class="col-12">
                    <div class="form-group{{ $errors->has('paciente') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('paciente') ? ' is-invalid' : '' }}" name="paciente" id="input-paciente" onChange="getSelectedValue(this)" required="true" aria-required="true">
                        <option value="0" selected> Selecione uma opção</option>
                        @foreach($pets as $pet)
                          <option value="{{$pet->id}}">{{$pet->name}} - {{$pet->dono->name}}</option>
                        @endforeach
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
            <div id="prontuario-card" class="card d-none">
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
                <div class="align-items-center d-flex">
                  <h1 class="title-card pr-4">Procedimentos feitos</h1>
                  <a href="#" class="btn-delete">
                    <i class="material-icons">print</i>
                  </a>
                </div>
                <div class="row col-12 align-items-center p-0">
                  <div class="d-flex flex-column col-12 p-0">
                    <table id="prontuario" name="prontuario" class="table table-bordered table-hover prontuario" style="width:100%">
                      <tr>
                        <th>Nome do procedimento</th>
                        <th class="text-center">Quantidade/Limite</th>
                        <th class="text-center">Carencia</th>
                      </tr>
                    </table> 
                  </div>
                </div>
              </div>
              
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    function setNewStatus(){
      if(document.getElementById("status").getAttribute('value') == 1){
        document.getElementById("status").setAttribute('value',0);
        if(document.getElementById("status").classList.contains('d-none')){
          document.getElementById("status").classList.remove('d-none');
          document.getElementById("status").classList.add('d-flex');
        }
        if(!document.getElementById("ativo").classList.contains('d-none')){
          document.getElementById("ativo").classList.add('d-none');
        }
        if(document.getElementById("status-box").classList.contains('green')){
          document.getElementById("status-box").classList.remove('green');
        }
        if(!document.getElementById("status-box").classList.contains('red')){
          document.getElementById("status-box").classList.add('red');
        }
        document.getElementById("inativo").classList.remove('d-none');
      }else{
        document.getElementById("status").setAttribute('value',1);
        if(document.getElementById("status-box").classList.contains('d-none')){
          document.getElementById("status-box").classList.remove('d-none');
          document.getElementById("status-box").classList.add('d-flex');
        }
        if(!document.getElementById("inativo").classList.contains('d-none')){
          document.getElementById("inativo").classList.add('d-none');
        }
        if(!document.getElementById("status-box").classList.contains('green')){
          document.getElementById("status-box").classList.add('green');
        }
        if(document.getElementById("status-box").classList.contains('red')){
          document.getElementById("status-box").classList.remove('red');
        }
        document.getElementById("ativo").classList.remove('d-none');
      }
    }

    function getSelectedValue(sel){
      var opt;
          for ( var i = 0, len = sel.options.length; i < len; i++ ) {
              opt = sel.options[i];
              if ( opt.selected === true ) {
                  break;
              }
          }
          var caca = {!! json_encode($pets->toArray(), JSON_HEX_TAG) !!};

          var option = 0;
          for (var i = 0; i < caca.length; i++) {
            if(caca[i]["id"] == opt.value){
              option = i;
              break;
            }
          }
          document.getElementById("input-name").setAttribute('value',caca[option]["name"]);
          document.getElementById("input-raca").setAttribute('value',caca[option]["raca"]);
          document.getElementById("input-plano").setAttribute('value',caca[option]["plano"]);
          document.getElementById("status").setAttribute('value',caca[option]["status"]);
          document.getElementById("input-aniversario").setAttribute('value',caca[option]["aniversario"]);
          document.getElementById("input-especie").setAttribute('value',caca[option]["especie"]);
          document.getElementById("input-microchip").setAttribute('value',caca[option]["microchip"]);
          document.getElementById("dono_id").setAttribute('value',caca[option]["dono"]["id"]);
          document.getElementById("input-dono").value = caca[option]["dono"]["id"];
          document.getElementById("input-plano").value = caca[option]["plano"]["id"];

          $.ajax({
              url: "{{ route('paciente.consulta.prontuario') }}",
              type:'POST',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },  
              data: {paciente:caca[option]["id"],plano:caca[option]["plano"]["id"]},
              success: function(data) {
                console.log(data);
                var resultado = data;
                var table = document.getElementById("prontuario");
                var i = 0;
                for(var k in resultado) {
                  i=k;
                  console.log(i,k,resultado[k]);
                  var row = table.insertRow();
                  var cell1 = row.insertCell(0);
                  var cell2 = row.insertCell(1);
                  var cell3 = row.insertCell(2);

                  cell1.innerHTML = resultado[k]["nome"];
                  cell2.innerHTML = resultado[k]["qtd"] + '/' + resultado[k]["limite"];
                  cell3.innerHTML = resultado[k]["carencia"];
                }
                if(i>0){
                  document.getElementById("prontuario-card").classList.remove("d-none");
                }else{
                  if(!document.getElementById("prontuario-card").classList.contains("d-none")){
                    document.getElementById("prontuario-card").classList.add("d-none");
                  }
                }
              },
              error: function (request, status, error) {
                alert(error);
             }
          });

          if(caca[option]["status"] == 1){
            if(document.getElementById("status-box").classList.contains('d-none')){
              document.getElementById("status-box").classList.remove('d-none');
              document.getElementById("status-box").classList.add('d-flex');
            }
            if(!document.getElementById("inativo").classList.contains('d-none')){
              document.getElementById("inativo").classList.add('d-none');
            }
            if(!document.getElementById("status-box").classList.contains('green')){
              document.getElementById("status-box").classList.add('green');
            }
            if(document.getElementById("status-box").classList.contains('red')){
              document.getElementById("status-box").classList.remove('red');
            }
            document.getElementById("ativo").classList.remove('d-none');
          }else{
            if(document.getElementById("status-box").classList.contains('d-none')){
              document.getElementById("status-box").classList.remove('d-none');
              document.getElementById("status-box").classList.add('d-flex');
            }
            if(!document.getElementById("ativo").classList.contains('d-none')){
              document.getElementById("ativo").classList.add('d-none');
            }
            if(document.getElementById("status-box").classList.contains('green')){
              document.getElementById("status-box").classList.remove('green');
            }
            if(!document.getElementById("status-box").classList.contains('red')){
              document.getElementById("status-box").classList.add('red');
            }
            document.getElementById("inativo").classList.remove('d-none');
          }

          return opt;
    }
  </script>
@endsection