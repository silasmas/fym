@extends('layouts.template')

@section('content')
@include('parties.menu2')
@include('parties.banniere')

<section class="blog-details-section pt-170 pb-90">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        @if($event->cover_image)
          <img src="{{ \App\Support\MediaUrl::from($event->cover_image) }}" alt="{{ $event->title }}" class="mb-40 w-100">
        @endif
        <h1 class="mb-20">{{ $event->title }}</h1>
        <p class="mb-10"><i class="far fa-calendar-alt"></i> {{ $event->start_at->format('d F Y à H:i') }}</p>
        @if($event->end_at)
          <p class="mb-10"><i class="far fa-clock"></i> Fin : {{ $event->end_at->format('d/m/Y à H:i') }}</p>
        @endif
        @if($event->location)
          <p class="mb-30"><i class="far fa-map-marker-alt"></i> {{ $event->location }}</p>
        @endif
        @if($event->description)
          <div class="mb-50">{!! $event->description !!}</div>
        @endif

        <div class="contact-three_content-box">
          <div class="section-title section-title-left mb-40">
            <span class="sub-title">Inscription</span>
            <h2>S'inscrire à cet événement</h2>
          </div>
          @if(session('success'))
            <div class="alert alert-success mb-30">{{ session('success') }}</div>
          @endif
          @if($errors->any())
            <div class="alert alert-danger mb-30">
              <ul class="mb-0">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form action="{{ route('events.register', $event->slug) }}" method="post">
            @csrf
            <div class="form_group form-group">
              <input type="text" class="form_control" name="name" placeholder="Nom complet" value="{{ old('name') }}" required>
            </div>
            <div class="form_group form-group">
              <input type="email" class="form_control" name="email" placeholder="E-mail" value="{{ old('email') }}" required>
            </div>
            <div class="form_group form-group">
              <input type="text" class="form_control" name="phone" placeholder="Téléphone" value="{{ old('phone') }}">
            </div>
            <div class="form_group form-group">
              <textarea class="form_control" name="message" placeholder="Message (optionnel)">{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="main-btn btn-yellow">Confirmer mon inscription</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
