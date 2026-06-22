<!--====== Start Header Section ======-->
<header class="header-area">
    <div class="header-top-bar top-bar-one dark-black-bg">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-12 col-md-12 col-6">
                    <div class="top-bar-left d-flex align-items-center">
                        <span class="text">Bienvenue sur le site de la Fondation Yves Milan</span>
                        {{-- <span class="lang-dropdown">
                                    <select class="wide">
                                        <option value="01">English</option>
                                        <option value="02">French</option>
                                    </select>
                                </span> --}}
                    </div>
                </div>
                <div class="col-xl-6 col-lg-12 col-md-12 col-6">
                    <div class="top-bar-right">
                        <span class="text"><i class="far fa-clock"></i>{{ $settings['opening_hours'] ?? 'Lundi - Vendredi, 08h00 - 17h00' }}</span>
                        @include('parties.social-links')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle">
        <div class="container-1350">
            <div class="row align-items-center">
                <div class="col-xl-4 d-xl-block d-lg-none">
                    <div class="site-branding d-lg-block d-none">
                        <a href="{{ route('home') }}" class="brand-logo">
                            <img src="{{ asset('assets/images/logo.jpeg') }}" alt="Site Logo" height="80"
                                width="179">
                        </a>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12">
                    <div class="contact-information">
                        <div class="information-item_one d-flex">
                            <div class="icon">
                                <i class="flaticon-placeholder"></i>
                            </div>
                            <div class="info">
                                <h5 class="mb-1">Adresse</h5>
                                <p>{{ $settings['contact_address'] ?? 'Kinshasa, RDC' }}</p>
                            </div>
                        </div>
                        <div class="information-item_one d-flex">
                            <div class="icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <div class="info">
                                <h5 class="mb-1">E-mail</h5>
                                <p><a href="mailto:{{ $settings['contact_email'] ?? 'silasjmas@gmail.com' }}">{{ $settings['contact_email'] ?? 'silasjmas@gmail.com' }}</a></p>
                            </div>
                        </div>
                        <div class="button text-md-right text-sm-center">
                            <a href="{{ route('contact') }}" class="main-btn btn-yellow">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-navigation navigation-one">
        <div class="nav-overlay"></div>
        <div class="container-1350">
            <div class="primary-menu">
                <div class="site-branding">
                    <a href="#" class="brand-logo"><img src="{{ asset('assets/images/logo.jpeg') }}"
                            height="100" width="200" alt="FYM"></a>
                </div>
                <div class="nav-inner-menu">
                    <div class="nav-menu">
                        <!--=== Mobile Logo ===-->
                        <div class="mobile-logo mb-30 d-block d-xl-none text-center">
                            <a href="{{ route('home') }}" class="brand-logo"><img src="{{ asset('assets/images/logo.jpeg') }}"
                                    height="100" width="200" alt="FYM"></a>
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
                                <li class="menu-item"><a href="{{ route('portfolio') }}"
                                        class="{{ Route::currentRouteNamed('portfolio*') ? 'active' : '' }}">Nos
                                        Réalisations</a>
                                </li>
                                <li class="menu-item"><a href="{{ route('events.index') }}"
                                        class="{{ Route::currentRouteNamed('events.*') ? 'active' : '' }}">Événements</a>
                                </li>
                                <li class="menu-item"><a href="{{ route('posts.index') }}"
                                        class="{{ Route::currentRouteNamed('posts.*') ? 'active' : '' }}">Actualités</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!--=== Nav Right Item ===-->
                    <div class="nav-right-item">
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
</header>
<!--====== End Header Section ======-->
