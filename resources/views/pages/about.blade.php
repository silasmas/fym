@extends('layouts.template')

@section('content')
@include('parties.menu2')
@include('parties.banniere')

<section class="about-section p-r z-1 pt-170 pb-80">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="about-content-box content-box-gap mb-50">
          <div class="section-title section-title-left wow fadeInUp mb-30">
            <span class="sub-title">À propos</span>
            <h2>{{ $page?->title ?? 'Fondation Yves Milan Ngangay' }}</h2>
          </div>
          @if($page?->content)
            <div class="wow fadeInDown">{!! $page->content !!}</div>
          @else
            <p>
              <strong>La FONDATION Yves MILAN NGANGAY</strong> est une association sans but lucratif,
              philanthropique concourant à la réalisation des œuvres caritatives, de droit congolais,
              apolitique et non confessionnelle.
            </p>
            <p class="mt-20">
              {{ $settings['about_intro'] ?? 'Nous agissons au service des populations les plus vulnérables à travers des actions humanitaires durables.' }}
            </p>
          @endif
          <div class="about-button wow fadeInUp mt-30">
            <a href="{{ route('contact') }}" class="main-btn btn-yellow">Nous contacter</a>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="about-four_image-box text-right p-r mb-50 wow fadeInRight">
          @if($page?->cover_image)
            <img src="{{ \App\Support\MediaUrl::from($page->cover_image) }}" class="about-img_one" alt="{{ $page->title }}">
          @else
            <img src="{{ asset('assets/images/440x460.jpg') }}" class="about-img_one" alt="FYM">
            <img src="{{ asset('assets/images/366x276.jpg') }}" class="about-img_two" alt="FYM">
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

@include('parties.team-grid', ['teamMembers' => $teamMembers])

<div class="container-1350">
  <div class="partners-wrap-two yellow-bg pb-60 pt-50 p-r z-1">
    @include('parties.partners-slider', ['partners' => $partners, 'title' => 'Nos partenaires'])
  </div>
</div>

@endsection
