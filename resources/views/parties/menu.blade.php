<!--====== Start Header Section ======-->
<header class="header-area">
    <div class="header-top-bar top-bar-one dark-black-bg">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-12 col-md-12 col-6">
                    <div class="top-bar-left d-flex align-items-center">
                        <span class="text">Welcome to Agriculture & Organic Food Template</span>
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
    <div class="header-middle">
        <div class="container-1350">
            <div class="row align-items-center">
                <div class="col-xl-4 d-xl-block d-lg-none">
                    <div class="site-branding d-lg-block d-none">
                        <a href="index.html" class="brand-logo">
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
                                <h5 class="mb-1">Locations</h5>
                                <p>55 Main Street, New York</p>
                            </div>
                        </div>
                        <div class="information-item_one d-flex">
                            <div class="icon">
                                <i class="flaticon-email"></i>
                            </div>
                            <div class="info">
                                <h5 class="mb-1">Email Us</h5>
                                <p><a href="mailto:hotlineinfo@gmial.com">hotlineinfo@gmial.com</a></p>
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
                            <a href="#" class="brand-logo"><img src="{{ asset('assets/images/logo.jpeg') }}"
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
                                        class="{{ Route::current()->getName() == 'portfolio' ? 'active' : '' }}">Nos
                                        Réalisations</a>
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
