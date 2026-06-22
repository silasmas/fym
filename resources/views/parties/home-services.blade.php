<!--====== Start Service Section ======-->
<section class="service-one dark-black-bg pt-130 pb-125 p-r z-1">
  <div class="shape shape-one"><span><img src="{{ asset('assets/images/shape/tree1.png') }}" alt=""></span></div>
  <div class="shape shape-two"><span><img src="{{ asset('assets/images/shape/tree2.png') }}" alt=""></span></div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-10">
        <div class="section-title section-title-white text-center mb-60 wow fadeInUp">
          <span class="sub-title">Nos actions</span>
          <h2>Ce que nous faisons pour la communauté</h2>
        </div>
      </div>
    </div>
    <div class="row">
      @forelse($services as $index => $service)
        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-12">
          <div class="service-box text-center mb-70 wow {{ $index % 2 === 0 ? 'fadeInUp' : 'fadeInDown' }}">
            <div class="icon">
              <i class="{{ $service->icon ?: 'flaticon-social-care' }}"></i>
            </div>
            <div class="text">
              <h3 class="title">
                <a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a>
              </h3>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center">
          <p class="text-white">Aucun service publié pour le moment.</p>
        </div>
      @endforelse
    </div>
    @if($services->isNotEmpty())
      <div class="row">
        <div class="col-lg-12 text-center">
          <a href="{{ route('services') }}" class="main-btn bordered-btn bordered-white">Voir tous les services</a>
        </div>
      </div>
    @endif
  </div>
</section>
<!--====== End Service Section ======-->
