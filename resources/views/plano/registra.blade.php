@extends('layouts.app', ['activePage' => 'consultapaciente', 'titlePage' => __('Consultar Paciente')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form id="plano-edit-form" method="POST" action="{{route('plano.carencia.registra')}}">
            @csrf
            <input type="hidden" name="plano_id" id="plano_id" value=""/>
          </form>
          <form method="post" action="{{ route('plano.registra.salvar') }}" autocomplete="off" class="form-horizontal">
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
                  <h1 class="title-card pr-4">Plano</h1>
                </div>
                <div class="row col-12 p-0">
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Nome do Plano') }}</label>
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Plano') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-3 d-flex justify-content-center align-items-center p-0">
                    <input type="hidden" id="edit" name="edit" value="0"/>
                    <button id="button" type="submit" class="btn btn-primary">{{ __('Adicionar plano') }}</button>
                  </div>
                </div>
              </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="align-items-center">
                    <h1 class="title-card pr-4">Planos</h1>
                  </div>
                  <div class="row col-12 align-items-center p-0">
                    <div class="d-flex flex-column col-12 p-0">
                      <table id="prontuario" class="table table-bordered table-hover" style="width:100%">
                        <tr>
                          <th>Nome do plano</th>
                          <th class="text-center">Ações</th>
                        </tr>
                        @foreach($planos as $plano)
                          <tr>
                              <td id="todo_{{$plano->id}}">{{$plano->name}}</td>
                              <td class="d-flex justify-content-center">                                
                                <a href="#" value="{{$plano->id}}" class="btn-edit" name="btn-edit" onClick="editOnClick(this)">
                                  <i class="material-icons">edit</i>
                                </a>
                                <a href="#" value="{{$plano->id}}" class="btn-delete" onClick="deleteOnClick(this)">
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
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    function deleteOnClick(sel){
      $.ajax({
        url: "{{ route('plano.registra.delete') }}",
        type:'DELETE',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },  
        data: {id:sel.getAttribute('value')},
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
    function editOnClick(sel){
      document.getElementById("plano_id").setAttribute('value',sel.getAttribute('value'));

      document.getElementById("plano-edit-form").submit();

    }
  </script>
@endsection