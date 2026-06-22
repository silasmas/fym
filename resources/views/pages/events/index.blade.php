@extends('layouts.template')

@section('content')
@include('parties.menu2')
@include('parties.banniere')

<section class="blog-standard-section pt-170 pb-90">
  <div class="container">
    <div class="row">
      @forelse($events as $event)
        <div class="col-lg-4 col-md-6 mb-40">
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
              <p><i class="far fa-calendar-alt"></i> {{ $event->start_at->format('d/m/Y à H:i') }}</p>
              @if($event->location)
                <p><i class="far fa-map-marker-alt"></i> {{ $event->location }}</p>
              @endif
              <a href="{{ route('events.show', $event->slug) }}" class="main-btn btn-yellow mt-20">Voir & s'inscrire</a>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center">
          <p>Aucun événement à venir pour le moment.</p>
        </div>
      @endforelse
    </div>
    <div class="mt-30">{{ $events->links() }}</div>
  </div>
</section>

@endsection
