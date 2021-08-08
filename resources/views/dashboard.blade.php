@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Home')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <h1>Bem-vindo ao Sistema PET</h1>
          <div class="card">
            <div id="bannerCarousel" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                @foreach($banners as $banner)
                @if ($loop->first)
                <div class="carousel-item active">
                @else
                <div class="carousel-item">
                @endif
                  <img class="d-block w-100" src="img/banner/home/{{$banner->id}}.png" alt="{{$banner->name}}">
                </div>
                @endforeach
              </div>
              <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
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