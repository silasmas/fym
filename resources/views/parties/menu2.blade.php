   <!--====== offcanvas-panel ======-->
   <div class="offcanvas-panel">
       <div class="panel-overlay"></div>
       <div class="offcanvas-panel-inner">
           <div class="panel-logo">
               <a href=""><img src="{{ asset('assets/images/logo.jpeg') }}" alt="FYM"></a>
           </div>
           <div class="about-us">
               <h5 class="panel-widget-title">A propos de nous</h5>
               <p>
                   <b>La FONDATION Yves MILAN NGANGAY</b> est une association
                   sans but lucratif, philanthropique concourant à la
                   réalisation des œuvres caritatives, de droit congolais,
                   apolitique et non confessionnelle.
               </p>
           </div>
           <div class="contact-us">
               <h5 class="panel-widget-title">Contact Us</h5>
               <ul>
                   <li>
                       <i class="fal fa-map-marker-alt"></i>
                       121 King St, Melbourne VIC 3000, Australia.
                   </li>
                   <li>
                       <i class="fal fa-envelope-open"></i>
                       <a href="mailto:hello@barky.com"> hello@barky.com</a>
                       <a href="mailto:info@barky.com">info@barky.com</a>
                   </li>
                   <li>
                       <i class="fal fa-phone"></i>
                       <a href="tel:(312)-895-9800">(312) 895-9800</a>
                       <a href="tel:(312)-895-9888">(312) 895-9888</a>
                   </li>
               </ul>
           </div>
           <a href="#" class="panel-close"><i class="fal fa-times"></i></a>
       </div>
   </div><!--====== offcanvas-panel ======-->
   <!--====== Start Header Section ======-->
   <header class="header-area">
       <!-- Header Top Bar -->
       <div class="header-top-bar top-bar-one dark-black-bg">
           <div class="container-fluid">
               <div class="row align-items-center">
                   <div class="col-xl-6 col-lg-12 col-md-12 col-6">
                       <div class="top-bar-left d-flex align-items-center">
                           <span class="text">Welcome to Agriculture & Organic Food Template</span>

                       </div>
                   </div>
                   <div class="col-xl-6 col-lg-12 col-md-12 col-6">
                       <div class="top-bar-right">
                           <span class="text"><i class="far fa-clock"></i>Opening Hours : Sunday- Friday, 08:00 am -
                               05:00pm</span>
                           <ul class="social-link">
                               <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                               <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                               <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                               <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <!-- Header Navigation -->
       <div class="header-navigation navigation-three">
           <div class="nav-overlay"></div>
           <div class="container-fluid">
               <div class="primary-menu">
                   <!-- Site Branding -->
                   <div class="site-branding">
                       <a href="" class="brand-logo"><img src="{{ asset('assets/images/ll.png') }}"
                               alt="FYM"></a>
                       <a href="" class="sticky-logo"><img src="{{ asset('assets/images/logo.jpeg') }}"
                               alt="FYM" height="100" width="200">
                            </a>
                   </div>
                   <!-- Nav inner Menu -->
                   <div class="nav-inner-menu">
                       <!-- Nav Menu -->
                       <div class="nav-menu">
                           <!--=== Mobile Logo ===-->
                           <div class="mobile-logo mb-30 d-block d-xl-none text-center">
                               <a href="index.html" class="brand-logo"><img
                                       src="{{ asset('assets/images/logo.jpeg') }}" height="100" width="200"
                                       alt="FYM"></a>
                           </div>
                           <!--=== Navbar Call Button ===-->
                           <div class="call-button text-center">
                               <span><i class="far fa-phone"></i><a href="tel:+012(345)678">+012 (345) 678</a></span>
                           </div>
                           <!--=== Main Menu ===-->
                           <nav class="main-menu">
                               <ul>
                                   <li class="menu-item">
                                       <a href="{{ route('home') }}"
                                           class="{{ Route::current()->getName() == 'home' ? 'active' : '' }}">Accueil</a>
                                   </li>
                                   <li><a href="{{ route('about') }}"
                                           class="{{ Route::current()->getName() == 'about' ? 'active' : '' }}">A
                                           propos</a></li>
                                   <li class="menu-item">
                                       <a href="{{ route('services') }}"
                                           class="{{ Route::current()->getName() == 'services' ? 'active' : '' }}">Nos
                                           Services</a>
                                   </li>
                                   <li class="menu-item">
                                    <a  href="{{ route('portfolio') }}"
                                           class="{{ Route::current()->getName() == 'portfolio' ? 'active' : '' }}">Nos Réalisations</a>
                                      </li>
                               </ul>
                           </nav>
                           <!-- Navbar Menu Button -->
                           <div class="menu-button">
                               <a href="{{ route('contact') }}" class="main-btn btn-yellow">Nous contacter</a>
                           </div>
                       </div>
                       <!-- Nav Right Item -->
                       <div class="nav-right-item d-flex align-items-center">
                           <div class="call-button">
                               <span><i class="far fa-phone"></i><a href="tel:+012(345)678">+012 (345) 678</a></span>
                           </div>
                           <div class="menu-button">
                               <a href="{{ route('contact') }}" class="main-btn btn-yellow">Nous Contacter</a>
                           </div>
                           <div class="bar-item">
                               <a href="#"><img src="assets/images/bar.png" alt=""></a>
                           </div>
                           <div class="navbar-toggler">
                               <span></span>
                               <span></span>
                               <span></span>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </header><!--====== End Header Section ======-->
