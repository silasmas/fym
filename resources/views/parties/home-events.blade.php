@if($events->isNotEmpty())
<section class="blog-section p-r z-1 pt-100 pb-80">
  <div class="container">
    <div class="row align-items-end mb-50">
      <div class="col-lg-8">
        <div class="section-title section-title-left wow fadeInLeft">
          <span class="sub-title">Événements</span>
          <h2>Prochains événements de la fondation</h2>
        </div>
      </div>
      <div class="col-lg-4 text-lg-right">
        <a href="{{ route('events.index') }}" class="main-btn bordered-btn bordered-yellow">Tous les événements</a>
      </div>
    </div>
    <div class="row">
      @foreach($events as $event)
        <div class="col-lg-4 col-md-6 mb-30">
          <div class="blog-post-item-one h-100">
            @if($event->cover_image)
              <div class="post-thumbnail">
                <img src="{{ \App\Support\MediaUrl::from($event->cover_image) }}" alt="{{ $event->title }}">
              </div>
            @endif
            <div class="entry-content">
              <h3 class="title">
                <a href="{{ route('events.show', $event->slug) }}">{{ $event->title }}</a>
              </h3>
              <p><i class="far fa-calendar-alt"></i> {{ $event->start_at->format('d/m/Y H:i') }}</p>
              @if($event->location)
                <p><i class="far fa-map-marker-alt"></i> {{ $event->location }}</p>
              @endif
              <a href="{{ route('events.show', $event->slug) }}" class="main-btn btn-yellow mt-20">S'inscrire</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif
