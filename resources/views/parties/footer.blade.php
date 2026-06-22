  <!--====== Start Footer ======-->
  <footer class="footer-default footer-white dark-black-bg">
      <div class="container">
          <div class="footer-top wow fadeInUp">
              <div class="row">
                  <div class="col-lg-4 col-md-12 footer-contact-item">
                      <div class="contact-info d-flex justify-content-center">
                          <div class="site-logo text-center">
                              <a href="{{ route('home') }}" class="brand-logo">
                                  <img src="{{ asset('assets/images/logo.jpeg') }}" height="100" width="200"
                                      alt="Footer Logo">
                              </a>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-12 footer-contact-item">
                      <div class="contact-info d-flex">
                          <div class="icon">
                              <i class="flaticon-placeholder"></i>
                          </div>
                          <div class="text">
                              <h5>Adresse</h5>
                              <h6>{{ $settings['contact_address'] ?? 'Kinshasa, RDC' }}</h6>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-4 col-md-12 footer-contact-item">
                      <div class="contact-info d-flex">
                          <div class="icon">
                              <i class="flaticon-placeholder"></i>
                          </div>
                          <div class="text">
                              <h5>E-mail</h5>
                              <h6><a href="mailto:{{ $settings['contact_email'] ?? 'silasjmas@gmail.com' }}">{{ $settings['contact_email'] ?? 'silasjmas@gmail.com' }}</a></h6>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
         <div class="footer-widget pt-70 pb-25">
    <div class="row">
        <!-- À propos de nous -->
        <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12">
            <div class="footer-widget about-widget mb-40 wow fadeInDown">
                <h4 class="widget-title">À propos de nous</h4>
                <div class="footer-about-content">
                    <p>{{ $settings['about_footer'] ?? 'La Fondation Yves Milan œuvre pour le bien-être des communautés à travers des actions caritatives et humanitaires.' }}</p>
                    <div class="social-box">
                        <h4 class="mb-15">Suivez-nous</h4>
                        @include('parties.social-links')
                    </div>
                </div>
            </div>
        </div>

        <!-- Services -->
        <div class="col-lg-4 col-lg-4 col-md-7 col-sm-12">
            <div class="footer-widget footer-nav-widget mb-40 wow fadeInUp">
                <h4 class="widget-title">Liens utiles</h4>
                <div class="footer-widget-nav">
                    <ul>
                        @forelse($footerServices as $service)
                          <li><a href="{{ route('services.show', $service->slug) }}">{{ $service->title }}</a></li>
                        @empty
                          <li><a href="{{ route('services') }}">Nos services</a></li>
                        @endforelse
                    </ul>
                    <ul>
                        <li><a href="{{ route('about') }}">À propos</a></li>
                        <li><a href="{{ route('events.index') }}">Événements</a></li>
                        <li><a href="{{ route('posts.index') }}">Actualités</a></li>
                        <li><a href="{{ route('portfolio') }}">Réalisations</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Actualités récentes -->
        <div class="col-lg-4 col-lg-4 col-md-6 col-sm-12">
            <div class="footer-widget recent-post-widget mb-40 wow fadeInDown">
                <h4 class="widget-title">Actualités récentes</h4>
                <ul class="post-widget-wrap">
                    @forelse($recentPosts as $post)
                    <li class="post-item">
                        <img src="{{ \App\Support\MediaUrl::from($post->thumbnail) ?? asset('assets/images/85X85B.jpg') }}" alt="{{ $post->title }}">
                        <div class="post-title-date">
                            <h3 class="title"><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h3>
                            <span class="posted-on"><i class="fas fa-calendar-alt"></i>{{ $post->published_at?->format('d/m/Y') }}</span>
                        </div>
                    </li>
                    @empty
                    <li class="post-item">
                        <div class="post-title-date">
                            <p>Aucune actualité pour le moment.</p>
                        </div>
                    </li>
                    @endforelse
                </ul>
                <a href="{{ route('posts.index') }}" class="more-btn">Voir plus d'actualités</a>
            </div>
        </div>
    </div>
</div>

          <div class="footer-newsletter footer-newsletter-one text-white wow fadeInUp">
              <div class="row">
                  <div class="col-xl-3">
                      <div class="footer-text">
                          <h5>Abonnez-vous à notre newsletter
                              pour recevoir plus d’actualités</h5>
                      </div>
                  </div>

                  <div class="col-xl-9">
                      <div class="newsletter-form">
                          <form>
                              <div class="row">
                                  <div class="col-lg-5">
                                      <div class="form_group">
                                          <input type="email" class="form_control" placeholder="Adresse e-mail"
                                              name="email" required>
                                      </div>
                                  </div>
                                  <div class="col-lg-4">
                                      <div class="form_group">
                                          <input type="text" class="form_control" placeholder="Téléphone"
                                              name="phone" required>
                                      </div>
                                  </div>
                                  <div class="col-lg-3">
                                      <div class="form_group">
                                          <button class="main-btn btn-yellow">S’abonner maintenant</button>
                                      </div>
                                  </div>
                              </div>
                          </form>

                      </div>
                  </div>
              </div>
          </div>
          <div class="footer-copyright">
              <div class="col-lg-12">
                  <div class="copyright-text text-center">
                      <p>&copy; 2025 FYM. Tous droit reservé</p>
                  </div>
              </div>
          </div>
      </div>
  </footer><!--====== End Footer ======-->
