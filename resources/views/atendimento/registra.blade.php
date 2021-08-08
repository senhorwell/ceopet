@extends('layouts.app', ['activePage' => 'consultapaciente', 'titlePage' => __('Consultar Paciente')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form id="formulario" method="POST" action="{{ route('atendimento.registra.prontuario') }}" autocomplete="off" class="form-horizontal">
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
                  <h1 class="title-card pr-4">Dados do Paciente</h1>
                  <p class="p-0 m-0">Aqui você pode escolher o paciente a ser atendido</p>
                </div>
                <div class="row">
                  <label class="col-12 col-form-label">{{ __('Selecione um Paciente') }}</label>
                  <div class="col-12">
                    <div class="form-group{{ $errors->has('paciente') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('paciente') ? ' is-invalid' : '' }}" onChange="getSelectedValue(this)" name="paciente" id="input-paciente" required="true" aria-required="true">
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
                      <input disabled class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Aisha') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Raça') }}</label>
                    <div class="form-group{{ $errors->has('raca') ? ' has-danger' : '' }}">
                      <input disabled class="form-control{{ $errors->has('raca') ? ' is-invalid' : '' }}" name="raca" id="input-raca" type="text" placeholder="{{ __('Splitz') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('raca'))
                        <span id="raca-error" class="error text-danger" for="input-raca">{{ $errors->first('raca') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Plano') }}</label>
                    <div class="form-group{{ $errors->has('plano') ? ' has-danger' : '' }}">
                      <input disabled class="form-control{{ $errors->has('plano') ? ' is-invalid' : '' }}" name="plano" id="input-plano" type="text" placeholder="Vip Gold" value="" required="true" aria-required="true"/>
                      <input type="hidden" name="input-plano-id" id="plano-id"/>
                      @if ($errors->has('plano'))
                        <span id="plano-error" class="error text-danger" for="input-plano">{{ $errors->first('plano') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Nome do Responsável') }}</label>
                    <div class="form-group{{ $errors->has('dono_name') ? ' has-danger' : '' }}">
                      <input disabled class="form-control{{ $errors->has('dono_name') ? ' is-invalid' : '' }}" name="dono_name" id="input-dono_name" type="text" placeholder="Danila" value="" required="true" aria-required="true"/>
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
                <div class="d-inline-flex align-items-center">
                  <h1 class="title-card pr-4">Selecionar Procedimento</h1>
                  <p>Aqui você poderá escolher o procedimento à ser utilizado</p>
                </div>
                <div class="row col-12 align-items-center p-0">
                  <div class="d-flex flex-column col-6 p-0">
                    <label class="col-12 col-form-label">{{ __('Selecione o Procedimento') }}</label>
                    <div class="col-12">
                      <div class="form-group{{ $errors->has('procedimento') ? ' has-danger' : '' }}">
                        <select class="form-control{{ $errors->has('procedimento') ? ' is-invalid' : '' }}" name="prod_id" id="input-procedimento" required="true" aria-required="true">
                          <option value="0" selected>Selecione um procedimento</option>
                          @foreach($procedimentos as $procedimento)
                            <option value="{{$procedimento->id}}">{{$procedimento->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="d-flex flex-column col-3 p-0">
                    <label class="form-label">{{ __('Quantidade') }}</label>
                    <div class="form-group{{ $errors->has('qtd') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('qtd') ? ' is-invalid' : '' }}" name="qtd" id="input-qtd" type="text" placeholder="{{ __('3') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('qtd'))
                        <span id="qtd-error" class="error text-danger" for="input-qtd">{{ $errors->first('qtd') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-3 p-0">
                    <button class="btn btn-primary btn-adicionar">{{ __('Adicionar procedimento') }}</button>
                  </div>
                  
                  
                  <div class="col-12">
                    <div class="d-flex flex-column w-100">
                      <label class="form-label">{{ __('Observações') }}</label>
                      <div class="form-group{{ $errors->has('obs') ? ' has-danger' : '' }}">
                        <textarea class="form-control{{ $errors->has('obs') ? ' is-invalid' : '' }}" name="obs" id="input-obs" value="" rows="1"></textarea>
                        @if ($errors->has('obs'))
                          <span id="obs-error" class="error text-danger" for="input-obs">{{ $errors->first('obs') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>

                  
              </div>
              
            </div>
            
            <div id="prontuario-card" class="card">
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
                <div class="align-items-center">
                  <h1 class="title-card pr-4">Prontuário</h1>
                </div>
                <div class="row col-12 align-items-center p-0">
                  <div class="d-flex flex-column col-12 p-0">
                    <table id="prontuario" name="prontuario" class="table table-bordered table-hover" style="width:100%">
                      <tr>
                        <th>Nome do procedimento</th>
                        <th class="text-center">Quantidade</th>
                        <th class="text-center">Obs</th>
                      </tr>
                      @foreach($prontuarios as $prontuario)
                        <tr class="d-none" value="{{$prontuario->pet_id}}">
                            <td>{{$prontuario->procedimento->name}}</td>
                            <td class="text-center">{{$prontuario->qtd}}</td>
                            <td>{{$prontuario->acoes}}</td>
                        </tr>
                      @endforeach
                    </table> 
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-5 mt-4">
              <div class="col-3 p-0">
                <input id="finalizar" type="hidden" name="finalizar" value="0"/>
                <button type="submit" class="btn btn-primary btn-submit">{{ __('Finalizar atendimento') }}</button>
              </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    function getSelectedValue(sel){
      var opt;
      for ( var i = 0, len = sel.options.length; i < len; i++ ) {
          opt = sel.options[i];
          if ( opt.selected === true ) {
              break;
          }
      }
      var caca = {!! json_encode($pets->toArray(), JSON_HEX_TAG) !!};

      document.getElementById("input-name").setAttribute('value',caca[opt.value-1]["name"]);
      document.getElementById("input-raca").setAttribute('value',caca[opt.value-1]["raca"]);
      document.getElementById("input-plano").setAttribute('value',caca[opt.value-1]["plano"]["name"]);
      document.getElementById("plano-id").setAttribute('value',caca[opt.value-1]["plano"]["id"]);
      document.getElementById("input-dono_name").setAttribute('value',caca[opt.value-1]["dono"]["name"]);

      var table = document.getElementById('prontuario'), 
      rows = table.getElementsByTagName('tr'),
      i, j, cells, customerId;

      for (i = 0; i < rows.length; ++i) {
        if(opt.value == rows[i].getAttribute("value")){
          if(rows[i].classList.contains("d-none")){
            rows[i].classList.remove("d-none");
          }else{
            rows[i].classList.add("d-none");

          }
        }
      }
      
      return opt;
    }
    $(document).ready(function() {
      
      $(".btn-adicionar").click(function(e){
          var table = document.getElementById("prontuario");
          var prod = $("#input-procedimento option:selected").text();
          var prod_id = $("#input-procedimento").val();
          var plano_id = $("#plano-id").val();
          var qtd = $("#input-qtd").val();
          var obs = $("#input-obs").val();

          e.preventDefault();
          var id = $("#input-paciente option:selected").val();

          $.ajax({
              url: "{{ route('atendimento.registra.prontuario') }}",
              type:'POST',
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },  
              data: {paciente:id,prod_id:prod_id,qtd:qtd,obs:obs,plano_id:plano_id},
              success: function(data) {
                var row = table.insertRow(1);

                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);

                cell1.innerHTML = prod;
                cell2.innerHTML = qtd;
                cell3.innerHTML = obs;
              },
              error: function (request, status, error) {
                alert("Paciente já passou do limite para este procedimento");
             }
          });
      });
      $(".btn-submit").click(function(e){
          e.preventDefault();
          document.getElementById("finalizar").setAttribute('value',1);
          $("#formulario").submit();
      });
    });

  </script>
@endsection