@extends('layouts.app', ['activePage' => 'consultapaciente', 'titlePage' => __('Consultar Paciente')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form id="formulario" method="POST" action="{{ route('plano.carencia.registra.salvar') }}" autocomplete="off" class="form-horizontal">
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
                  <h1 class="title-card pr-4">Dados do Plano</h1>
                  <p class="p-0 m-0">Aqui você pode editar o plano</p>
                </div>
                <div class="row col-12 p-0">
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Nome do Plano') }}</label>
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Plano') }}" value="{{$plano->name}}" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
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
                  <h1 class="title-card pr-4">Selecionar Procedimentos cobertos</h1>
                  <p>Aqui você poderá escolher o procedimento à ser coberto</p>
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
                    <label class="form-label">{{ __('Carencia (dias)') }}</label>
                    <div class="form-group{{ $errors->has('carencia') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('carencia') ? ' is-invalid' : '' }}" name="carencia" id="input-carencia" type="text" placeholder="{{ __('1') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('carencia'))
                        <span id="carencia-error" class="error text-danger" for="input-carencia">{{ $errors->first('carencia') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="d-flex flex-column col-3 p-0">
                    <label class="form-label">{{ __('Limite (anos)') }}</label>
                    <div class="form-group{{ $errors->has('limite') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('limite') ? ' is-invalid' : '' }}" name="limite" id="input-limite" type="text" placeholder="{{ __('1') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('limite'))
                        <span id="limite-error" class="error text-danger" for="input-limite">{{ $errors->first('limite') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-3 p-0">
                    <input type="hidden" name="plano_id" id="plano_id" value="{{$plano->id}}" />
                    <button class="btn btn-primary btn-adicionar">{{ __('Adicionar procedimento') }}</button>
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
                  <h1 class="title-card pr-4">Procedimentos</h1>
                </div>
                <div class="row col-12 align-items-center p-0">
                  <div class="d-flex flex-column col-12 p-0">
                    <table id="prontuario" name="prontuario" class="table table-bordered table-hover" style="width:100%">
                      <tr>
                        <th>Nome do procedimento</th>
                        <th class="text-center">Carencia</th>
                        <th class="text-center">Limite</th>
                        <th class="text-center">Ações</th>
                      </tr>
                      @foreach($carencias as $carencia)
                        <tr value="{{$carencia->id}}">
                            <td>{{$carencia->procedimento->name}}</td>
                            <td class="text-center">{{$carencia->carencia}}</td>
                            <td class="text-center">{{$carencia->limite}}</td>
                            <td class="d-flex justify-content-center">
                              <form id="carencia-edit-form" method="POST" action="{{route('plano.carencia.registra.deletar')}}">
                                @csrf
                                <input type="hidden" name="carencia_id" id="carencia_id" value="{{$carencia->id}}"/>
                              </form>
                              <a href="#" value="{{$carencia->id}}" class="btn-delete" onClick="deleteOnClick(this)">
                                <i class="material-icons">delete_forever</i>
                              </a>
                            </td>
                        </tr>
                      @endforeach
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    function deleteOnClick(sel){
      carencia_id = sel.getAttribute("value");

      $.ajax({
        url: "{{ route('plano.carencia.registra.deletar') }}",
        type:'DELETE',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },  
        data: {id:carencia_id},
        success: function(data) {
          var i = sel.parentNode.parentNode.rowIndex;
          document.getElementById("prontuario").deleteRow(i);
          if(data == "success"){
            alert("Deu sucesso aqui!");
          }else{
            alert("Não deu sucesso não");
          }
        }
      });
    }
    function getSelectedValue(sel){
      var opt;
      for ( var i = 0, len = sel.options.length; i < len; i++ ) {
          opt = sel.options[i];
          if ( opt.selected === true ) {
              break;
          }
      }

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
          var procedimento_id = $("#input-procedimento").val();
          var name = $("#input-name").val();
          var limite = $("#input-limite").val();
          var carencia = $("#input-carencia").val();
          var plano_id = $("#plano_id").val();

          if(procedimento_id != 0){
            var row = table.insertRow(1);

            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);

            cell1.innerHTML = prod;
            cell2.innerHTML = carencia;
            cell3.innerHTML = limite;

            e.preventDefault();
            var id = $("#input-paciente option:selected").val();

            $.ajax({
                url: "{{ route('plano.carencia.registra.salvar') }}",
                type:'POST',
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },  
                data: {id:id,procedimento_id:procedimento_id,name:name,limite:limite,carencia:carencia,plano_id:plano_id},
                success: function(data) {
                  console.log(data);
                }
            });
          }
      });
      $(".btn-submit").click(function(e){
          e.preventDefault();
          document.getElementById("finalizar").setAttribute('value',1);
          $("#formulario").submit();
      });
    });

  </script>
@endsection