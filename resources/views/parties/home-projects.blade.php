<!--====== Start Gallery Section ======-->
<section class="projects-section pt-130 pb-95 p-r z-1">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-8 col-md-9">
        <div class="section-title section-title-left mb-60 wow fadeInLeft">
          <span class="sub-title">Nos réalisations</span>
          <h2>Découvrez nos projets et actions sur le terrain</h2>
        </div>
      </div>
      <div class="col-lg-4 col-md-3">
        <div class="project-arrows mb-60 float-md-right wow fadeInRight"></div>
      </div>
    </div>
    <div class="projects-slider-one">
      @forelse($projets as $index => $projet)
        @php
          $image = \App\Support\MediaUrl::from($projet->cover_image)
            ?? \App\Support\MediaUrl::from($projet->photos->first()?->path)
            ?? asset('assets/images/300x375A.jpg');
        @endphp
        <div class="project-item wow {{ $index % 2 === 0 ? 'fadeInUp' : 'fadeInDown' }}">
          <div class="img-holder">
            <img src="{{ $image }}" alt="{{ $projet->title }}">
            <div class="hover-portfolio">
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
      @empty
        <div class="project-item wow fadeInUp">
          <div class="img-holder">
            <img src="{{ asset('assets/images/300x375A.jpg') }}" alt="Réalisation">
          </div>
        </div>
      @endforelse
    </div>
  </div>
</section>
<!--====== End Gallery Section ======-->
