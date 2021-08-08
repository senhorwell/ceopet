@extends('layouts.app', ['activePage' => 'consultapaciente', 'titlePage' => __('Consultar Paciente')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('banner.registra.salvar') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data">
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
                  <h1 class="title-card pr-4">Banner</h1>
                </div>
                <div class="row col-12 p-0">
                  <div class="col-4 d-flex justify-content-center align-items-center px-0">
                    <div class="input-group">
                      <div class="col-12">
                        <input type="file" name="image" class="form-control">
                      </div>
                    </div>
                    @if ($errors->has('foto'))
                      <div id="foto-error" class="error text-danger pl-3" for="foto" style="display: block;">
                        <strong>{{ $errors->first('foto') }}</strong>
                      </div>
                    @endif
                  </div>
                  <div class="col-5 d-flex justify-content-center align-items-center px-0">
                    <div class="col-sm-7">
                      <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-name" type="text" placeholder="{{ __('Nome') }}" value="" required="true" aria-required="true"/>
                        @if ($errors->has('name'))
                          <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-3 d-flex justify-content-center align-items-center p-0">
                    <input type="hidden" id="edit" name="edit" value="0"/>
                    <button id="button" type="submit" class="btn btn-primary">{{ __('Adicionar banner') }}</button>
                  </div>
                </div>
              </div>
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="align-items-center">
                    <h1 class="title-card pr-4">Banners</h1>
                  </div>
                  <div class="row col-12 align-items-center p-0">
                    <div class="d-flex flex-column col-12 p-0">
                      <table id="banner-list" class="table table-bordered table-hover" style="width:100%">
                        <tr>
                          <th class="header-pic"></th>
                          <th>Nome do banner</th>
                          <th class="text-center">Ações</th>
                        </tr>
                        @foreach($banners as $banner)
                          <tr>
                              <td class="text-center"><img src="/img/banner/home/{{$banner->id}}.png" /></td>
                              <td id="todo_{{$banner->id}}">{{$banner->name}}</td>
                              <td class="d-flex justify-content-center">
                                <form id="banner-edit-form" method="POST" action="{{route('plano.carencia.registra')}}">
                                  @csrf
                                  <input type="hidden" name="banner-id" value="{{$banner->id}}"/>
                                </form>
                                <a href="#" value="{{$banner->id}}" class="btn-delete" onClick="deleteOnClick(this)">
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
        url: "{{ route('banner.registra.delete') }}",
        type:'DELETE',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },  
        data: {id:sel.getAttribute('value')},
        success: function(data) {
          var i = sel.parentNode.parentNode.rowIndex;
          document.getElementById("banner-list").deleteRow(i);
          if(data == "success"){
            alert("Deu sucesso aqui!");
          }else{
            alert("Não deu sucesso não");
          }
        }
      });
    }
  </script>
@endsection