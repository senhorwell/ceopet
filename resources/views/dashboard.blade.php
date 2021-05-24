@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Home')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1>Bem-vindo ao Sistema PET</h1>
          <div class="card">
            <img src="img/home.jpg"/>
          </div>
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