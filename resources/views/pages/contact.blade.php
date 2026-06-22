@extends('layouts.template')

@section('content')
@include('parties.menu2')
@include('parties.banniere')

<section class="contact-information-one p-r z-1 pt-215 pb-130">
  <div class="information-img_one wow fadeInRight">
    <img src="{{ asset('assets/images/contact/img-1.jpg') }}" alt="Contact FYM">
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xl-9 col-lg-12">
        <div class="contact-two_information-box">
          <div class="section-title section-title-left mb-50 wow fadeInUp">
            <span class="sub-title">Nous contacter</span>
            <h2>Nous sommes prêts à vous aider</h2>
          </div>
          <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="information-item-two info-one mb-30 wow fadeInDown">
                <div class="icon"><i class="far fa-map-marker-alt"></i></div>
                <div class="info">
                  <h5>Adresse</h5>
                  <p>{{ $settings['contact_address'] ?? 'Kinshasa, RDC' }}</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="information-item-two mb-30 info-two wow fadeInUp">
                <div class="icon"><i class="far fa-envelope-open-text"></i></div>
                <div class="info">
                  <h5>E-mail</h5>
                  <p><a href="mailto:{{ $settings['contact_email'] ?? 'silasjmas@gmail.com' }}">{{ $settings['contact_email'] ?? 'silasjmas@gmail.com' }}</a></p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="information-item-two mb-30 info-three wow fadeInDown">
                <div class="icon"><i class="far fa-phone"></i></div>
                <div class="info">
                  <h5>Téléphone</h5>
                  <p><a href="tel:{{ $settings['contact_phone'] ?? '' }}">{{ $settings['contact_phone'] ?? '+243' }}</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@if(!empty($settings['map_embed_url']))
<section class="contact-page-map">
  <div class="map-box">
    <iframe src="{{ $settings['map_embed_url'] }}" title="Carte"></iframe>
  </div>
</section>
@endif

<section class="contact-three pb-70 wow fadeInUp">
  <div class="container">
    <div class="row justify-content-end">
      <div class="col-xl-7 col-lg-10">
        <div class="contact-three_content-box">
          <div class="section-title section-title-left mb-60">
            <span class="sub-title">Formulaire</span>
            <h2>Envoyez-nous un message</h2>
          </div>
          @include('parties.contact-form', ['showPhone' => true, 'showSubject' => true])
        </div>
      </div>
    </div>
  </div>
</section>

@include('parties.partners-slider', ['partners' => $partners, 'variant' => 'two', 'title' => 'Nos partenaires'])

@endsection
