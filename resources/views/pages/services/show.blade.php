@extends('layouts.template')

@section('content')
@include('parties.menu2')
@include('parties.banniere')

<section class="service-details-section pt-170 pb-90">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title section-title-left mb-40">
          <h2>{{ $service->title }}</h2>
        </div>
        @if($service->summary)
          <p class="mb-30">{{ $service->summary }}</p>
        @endif
        @if($service->content)
          <div class="service-content">
            {!! $service->content !!}
          </div>
        @endif
        <div class="mt-40">
          <a href="{{ route('services') }}" class="main-btn btn-yellow">Retour aux services</a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
