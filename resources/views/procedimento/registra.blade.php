@extends('layouts.app', ['activePage' => 'consultapaciente', 'titlePage' => __('Consultar Paciente')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('procedimento.registra.salvar') }}" autocomplete="off" class="form-horizontal">
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
                  <h1 class="title-card pr-4">Cadastro de procedimento</h1>
                  <p class="p-0 m-0">Aqui você cadastrar um novo procedimento</p>
                </div>
                <div class="row col-12 p-0">
                  <div class="d-flex flex-column col-3">
                    <label class="form-label">{{ __('Nome do Procedimento') }}</label>
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Procedimento') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('name'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                      @endif
                    </div>
                  </div>
                  <div class="col-3 d-flex justify-content-center align-items-center p-0">
                    <input type="hidden" id="edit" name="edit" value="0"/>
                    <button type="submit" id="button" class="btn btn-primary">{{ __('Adicionar procedimento') }}</button>
                  </div>
                </div>
              </div>
              </div> 
            
              <div class="card">
                <div class="card-body">
                  <div class="align-items-center">
                    <h1 class="title-card pr-4">Prontuário</h1>
                  </div>
                  <div class="row col-12 align-items-center p-0">
                    <div class="d-flex flex-column col-12 p-0">
                      <table id="prontuario" class="table table-bordered table-hover" style="width:100%">
                        <tr>
                          <th>Nome do procedimento</th>
                          <th class="text-center">Ações</th>
                        </tr>
                        @foreach($procedimentos as $procedimento)
                          <tr>
                              <td id="todo_{{$procedimento->id}}">{{$procedimento->name}}</td>
                              <td class="d-flex justify-content-center">
                              <a href="#" value="{{$procedimento->id}}" class="btn-edit" onClick="editOnClick(this)">
                                  <i class="material-icons">edit</i>
                                </a>
                                <a href="#" value="{{$procedimento->id}}" class="btn-delete" onClick="deleteOnClick(this)">
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

<script>
  function deleteOnClick(sel){
      $.ajax({
        url: "{{ route('procedimento.registra.delete') }}",
        type:'DELETE',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },  
        data: {id:sel.getAttribute('value')},
        success: function(data) {
          if(data == "success"){
            var i = sel.parentNode.parentNode.rowIndex;
            document.getElementById("prontuario").deleteRow(i);
            alert("Deu sucesso aqui!");
          }else{
            alert("Há prontuário(s) usando esse procedimento");
            console.log(data);
          }
        }
      });
    }
    function editOnClick(sel){
      var i = sel.getAttribute('value');
      document.getElementById("input-name").setAttribute('value',document.getElementById("todo_" + i).innerText);
      document.getElementById("button").innerText = "Editar Procedimento";
      document.getElementById("edit").setAttribute('value',i);
    }
</script>
@endsection