@extends('layouts.template')

@section('content')
@include('parties.menu')

@include('parties.hero-slider', ['sliders' => $sliders])
@include('parties.home-about')
@include('parties.home-services', ['services' => $services])
@include('parties.home-projects', ['projets' => $projets])
@include('parties.home-stats')
@include('parties.home-events', ['events' => $events])

<section class="contact-one p-r z-2">
  <div class="container-fluid">
    <div class="row no-gutters">
      <div class="col-lg-6">
        <div class="contact-one_content-box wow fadeInLeft">
          <div class="contact-wrapper">
            <div class="section-title section-title-left mb-40">
              <span class="sub-title">Nous contacter</span>
              <h2>Une question ? Envoyez-nous un message</h2>
            </div>
            <div class="contact-form">
              @include('parties.contact-form', ['submitLabel' => 'Envoyer le message'])
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="contact-one_information-box bg_cover wow fadeInRight" style="background-image: url({{ asset('assets/images/890X792.jpg') }});">
          <div class="information-box">
            <h3>Contactez-nous</h3>
            <p>{{ $settings['contact_intro'] ?? 'La Fondation Yves Milan est à votre écoute.' }}</p>
            <div class="information-item_one d-flex mb-25">
              <div class="icon"><i class="flaticon-placeholder"></i></div>
              <div class="info">
                <span class="sub-title mb-1">Adresse</span>
                <h5>{{ $settings['contact_address'] ?? 'Kinshasa, RDC' }}</h5>
              </div>
            </div>
            <div class="information-item_one d-flex mb-25">
              <div class="icon"><i class="flaticon-email"></i></div>
              <div class="info">
                <span class="sub-title mb-1">E-mail</span>
                <h5><a href="mailto:{{ $settings['contact_email'] ?? 'silasjmas@gmail.com' }}">{{ $settings['contact_email'] ?? 'silasjmas@gmail.com' }}</a></h5>
              </div>
            </div>
            <div class="information-item_one d-flex mb-25">
              <div class="icon"><i class="flaticon-phone-call"></i></div>
              <div class="info">
                <span class="sub-title mb-1">Téléphone</span>
                <h5><a href="tel:{{ $settings['contact_phone'] ?? '' }}">{{ $settings['contact_phone'] ?? '+243' }}</a></h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@include('parties.home-posts', ['posts' => $posts])
@include('parties.partners-slider', ['partners' => $partners, 'variant' => 'yellow', 'title' => 'Nos partenaires de confiance'])
@endsection
