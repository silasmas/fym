@extends('layouts.template')

@section('content')
@include('parties.menu2')
@include('parties.banniere')

<section class="project-details-section pt-170 pb-90">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        @php
          $cover = \App\Support\MediaUrl::from($projet->cover_image);
        @endphp
        @if($cover)
          <img src="{{ $cover }}" alt="{{ $projet->title }}" class="mb-40 w-100">
        @endif
        <h2 class="mb-20">{{ $projet->title }}</h2>
        @if($projet->location)
          <p><strong>Lieu :</strong> {{ $projet->location }}</p>
        @endif
        @if($projet->description)
          <div class="mb-40">{!! $projet->description !!}</div>
        @endif
        @if($projet->photos->isNotEmpty())
          <div class="row">
            @foreach($projet->photos as $photo)
              <div class="col-md-4 mb-30">
                <img src="{{ \App\Support\MediaUrl::from($photo->path) }}" alt="{{ $photo->caption ?? $projet->title }}" class="w-100">
                @if($photo->caption)
                  <p class="mt-10">{{ $photo->caption }}</p>
                @endif
              </div>
            @endforeach
          </div>
        @endif
        <a href="{{ route('portfolio') }}" class="main-btn btn-yellow mt-30">Retour au portfolio</a>
      </div>
    </div>
  </div>
</section>

@endsection
