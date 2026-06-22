@extends('layouts.template')

@section('content')
@include('parties.menu2')
@include('parties.banniere')

<section class="service-section pt-170 pb-80">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6">
        <div class="section-title section-title-left mb-50 wow fadeInLeft">
          <span class="sub-title">Nos services</span>
          <h2>Ce que nous offrons à la communauté</h2>
        </div>
      </div>
      <div class="col-lg-6 mb-50">
        <p class="wow fadeInRight">
          {{ $settings['services_intro'] ?? 'La Fondation Yves Milan mène des actions humanitaires et caritatives au service des populations.' }}
        </p>
      </div>
    </div>
    <div class="row">
      @forelse($services as $index => $service)
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
          <div class="service-box text-center mb-70 wow {{ $index % 2 === 0 ? 'fadeInUp' : 'fadeInDown' }}">
            <div class="icon">
              <i class="{{ $service->icon ?: 'flaticon-social-care' }}"></i>
            </div>
            <div class="text">
              <h3 class="title">
                <a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a>
              </h3>
              @if($service->summary)
                <p>{{ $service->summary }}</p>
              @endif
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center">
          <p>Aucun service publié pour le moment.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

@endsection
