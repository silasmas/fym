@extends('layouts.template')

@section('content')
@include('parties.menu2')
@include('parties.banniere')

<section class="project-grid-page p-r z-1 pt-170 pb-130">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-7 col-lg-10">
        <div class="section-title text-center mb-50 wow fadeInUp">
          <span class="sub-title">Galerie de projets</span>
          <h2>Nos réalisations sur le terrain</h2>
        </div>
      </div>
    </div>
    <div class="row project-row">
      @forelse($projets as $index => $projet)
        @php
          $image = \App\Support\MediaUrl::from($projet->cover_image)
            ?? \App\Support\MediaUrl::from($projet->photos->first()?->path)
            ?? asset('assets/images/portfolio/img-4.jpg');
        @endphp
        <div class="col-lg-4 col-md-6 col-sm-12 project-column">
          <div class="project-item-three mb-30 wow {{ $index % 2 === 0 ? 'fadeInUp' : 'fadeInDown' }}">
            <div class="img-holder">
              <img src="{{ $image }}" alt="{{ $projet->title }}">
              <div class="hover-portfolio">
                <div class="icon-btn">
                  <a href="{{ route('portfolio.show', $projet->slug) }}"><i class="far fa-arrow-right"></i></a>
                </div>
                <div class="hover-content">
                  <h3 class="title">
                    <a href="{{ route('portfolio.show', $projet->slug) }}">{{ $projet->title }}</a>
                  </h3>
                  @if($projet->location)
                    <p>{{ $projet->location }}</p>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center">
          <p>Aucun projet publié pour le moment.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

@endsection
