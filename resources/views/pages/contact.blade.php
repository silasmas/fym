@extends('layouts.template')


@section('content')
@include('parties.menu2')
@include("parties.banniere")
<!--====== Début de la section Informations de contact ======-->
<section class="contact-information-one p-r z-1 pt-215 pb-130">
    <div class="information-img_one wow fadeInRight"><img src="assets/images/contact/img-1.jpg" alt="Image"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-12">
                <div class="contact-two_information-box">
                    <div class="section-title section-title-left mb-50 wow fadeInUp">
                        <span class="sub-title">Nous contacter</span>
                        <h2>Nous sommes prêts à vous aider !
                            Besoin de produits alimentaires ou
                            de conseils ?</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="information-item-two info-one mb-30 wow fadeInDown">
                                <div class="icon">
                                    <i class="far fa-map-marker-alt"></i>
                                </div>
                                <div class="info">
                                    <h5>Adresse</h5>
                                    <p>505 Rue Principale, 2ème
                                        Bloc, New York</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="information-item-two mb-30 info-two wow fadeInUp">
                                <div class="icon">
                                    <i class="far fa-envelope-open-text"></i>
                                </div>
                                <div class="info">
                                    <h5>Adresse e-mail</h5>
                                    <p><a href="mailto:hotlinein@gmail.com">hotlinein@gmail.com</a></p>
                                    <p><a href="mailto:www.info.net">www.info.net</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="information-item-two mb-30 info-three wow fadeInDown">
                                <div class="icon">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="info">
                                    <h5>Numéro de téléphone</h5>
                                    <p><a href="tel:+01234567899">+012 (345) 678 99</a></p>
                                    <p><a href="tel:+0123456">+0123456</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <p>Une erreur de jugement peut survenir, mais nous sommes là pour fournir des solutions claires et fiables basées sur notre expertise et expérience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Fin de la section Informations de contact ======-->

<!--====== Début de la section Carte ======-->
<section class="contact-page-map">
    <div class="map-box">
        <iframe src="https://maps.google.com/maps?q=new%20york&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
    </div>
</section>
<!--====== Fin de la section Carte ======-->

<!--====== Début de la section Contact ======-->
<section class="contact-three pb-70 wow fadeInUp">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-xl-7 col-lg-10">
                <div class="contact-three_content-box">
                    <div class="section-title section-title-left mb-60">
                        <span class="sub-title">Nous contacter</span>
                        <h2>Besoin de produits biologiques !
                            Envoyez-nous un message</h2>
                    </div>
                    <div class="contact-form">
                        <form id="contactForm" action="assets/php/form-process.php" name="contactForm" method="post">
                            <div class="form_group form-group">
                                <input type="text" class="form_control" placeholder="Nom complet" id="name" name="name" required data-error="Veuillez entrer votre nom">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form_group form-group">
                                <input type="email" class="form_control" placeholder="Adresse e-mail" id="email" name="email" required data-error="Veuillez entrer votre adresse e-mail">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form_group form-group">
                                <textarea class="form_control" placeholder="Écrire votre message" id="message" name="message" required data-error="Veuillez entrer votre message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form_group form-group">
                                <button type="submit" class="main-btn btn-yellow">Envoyer le message</button>
                                <div id="msgSubmit" class="hidden"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Fin de la section Contact ======-->

<!--====== Début de la section Partenaires ======-->
<section class="partners-one p-r z-1 pt-50 pb-130">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-title text-center mb-30 wow fadeInUp">
                    <h4>Nous avons plus de 1235+ partenaires dans le monde</h4>
                </div>
            </div>
        </div>
        <div class="partner-slider-one wow fadeInDown">
            <div class="partner-item-two">
                <div class="partner-img">
                    <img src="assets/images/partner/img-7.png" alt="image partenaire">
                </div>
            </div>
            <div class="partner-item-two">
                <div class="partner-img">
                    <img src="assets/images/partner/img-8.png" alt="image partenaire">
                </div>
            </div>
            <div class="partner-item-two">
                <div class="partner-img">
                    <img src="assets/images/partner/img-9.png" alt="image partenaire">
                </div>
            </div>
            <div class="partner-item-two">
                <div class="partner-img">
                    <img src="assets/images/partner/img-10.png" alt="image partenaire">
                </div>
            </div>
            <div class="partner-item-two">
                <div class="partner-img">
                    <img src="assets/images/partner/img-11.png" alt="image partenaire">
                </div>
            </div>
            <div class="partner-item-two">
                <div class="partner-img">
                    <img src="assets/images/partner/img-12.png" alt="image partenaire">
                </div>
            </div>
            <div class="partner-item-two">
                <div class="partner-img">
                    <img src="assets/images/partner/img-10.png" alt="image partenaire">
                </div>
            </div>
        </div>
    </div>
</section>
<!--====== Fin de la section Partenaires ======-->


@endsection
