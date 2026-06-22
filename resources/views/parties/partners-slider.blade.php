@php
  $variant = $variant ?? 'default';
  $title = $title ?? 'Nos partenaires';
@endphp
<!--====== Start Partner Section ======-->
<section class="partners-section {{ $variant === 'yellow' ? 'yellow-bg pt-50 pb-60' : 'pt-50 pb-130' }} p-r z-1">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-6 col-lg-10">
        <div class="section-title text-center mb-30 wow fadeInUp">
          <h4 @if($variant === 'yellow') style="color: #fff;" @endif>{{ $title }}</h4>
        </div>
      </div>
    </div>
    <div class="partner-slider-one wow fadeInDown">
      @forelse($partners as $partner)
        <div class="partner-item{{ $variant === 'two' ? '-two' : '' }}">
          <div class="partner-img">
            @if($partner->website)
              <a href="{{ $partner->website }}" target="_blank" rel="noopener">
                <img src="{{ \App\Support\MediaUrl::from($partner->logo) ?? asset('assets/images/partner/img-1.png') }}" alt="{{ $partner->name }}">
              </a>
            @else
              <img src="{{ \App\Support\MediaUrl::from($partner->logo) ?? asset('assets/images/partner/img-1.png') }}" alt="{{ $partner->name }}">
            @endif
          </div>
        </div>
      @empty
        <div class="partner-item">
          <div class="partner-img">
            <img src="{{ asset('assets/images/partner/img-1.png') }}" alt="Partenaire">
          </div>
        </div>
      @endforelse
    </div>
  </div>
</section>
<!--====== End Partner Section ======-->
