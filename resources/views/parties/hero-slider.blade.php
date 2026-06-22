<!--====== Start Hero Section ======-->
<section class="hero-area-one">
  <div class="hero-slider-one">
    @forelse($sliders as $slider)
      <div class="single-slider">
        <div class="image-layer bg_cover" style="background-image: url('{{ \App\Support\MediaUrl::from($slider->image) ?? asset('assets/images/s1.jpg') }}');"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <div class="hero-content text-center">
                @if($slider->subtitle)
                  <span class="tag-line" data-animation="fadeInDown" data-delay=".4s">{{ $slider->subtitle }}</span>
                @endif
                @if($slider->title)
                  <h1 data-animation="fadeInUp" data-delay=".5s">{{ $slider->title }}</h1>
                @endif
                @if($slider->button_text && $slider->button_url)
                  <div class="hero-button" data-animation="fadeInDown" data-delay=".6s">
                    <a href="{{ $slider->button_url }}" class="main-btn btn-yellow">{{ $slider->button_text }}</a>
                  </div>
                @else
                  <div class="hero-button" data-animation="fadeInDown" data-delay=".6s">
                    <a href="{{ route('about') }}" class="main-btn btn-yellow">À propos de nous</a>
                    <a href="{{ route('portfolio') }}" class="main-btn bordered-btn bordered-white">Nos réalisations</a>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    @empty
      <div class="single-slider">
        <div class="image-layer bg_cover" style="background-image: url('{{ asset('assets/images/s1.jpg') }}');"></div>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-10">
              <div class="hero-content text-center">
                <span class="tag-line" data-animation="fadeInDown" data-delay=".4s">Fondation Yves Milan</span>
                <h1 data-animation="fadeInUp" data-delay=".5s">Œuvres caritatives & actions humanitaires</h1>
                <div class="hero-button" data-animation="fadeInDown" data-delay=".6s">
                  <a href="{{ route('about') }}" class="main-btn btn-yellow">À propos de nous</a>
                  <a href="{{ route('portfolio') }}" class="main-btn bordered-btn bordered-white">Nos réalisations</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforelse
  </div>
</section>
<!--====== End Hero Section ======-->
