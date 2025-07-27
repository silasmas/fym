@extends('layouts.template')


@section('content')
@include('parties.menu2')
@include("parties.banniere")

  <!--====== Start Portfolio Grid Page ======-->
        <section class="project-grid-page p-r z-1 pt-170 pb-130" id="project-filter">
            <div class="container">
                <div class="row justify-content-center">
    <div class="col-xl-7 col-lg-10">
        <div class="section-title text-center mb-50 wow fadeInUp">
            <span class="sub-title">Galerie de projets</span>
            <h2>Nous avons réalisé de nombreux projets<br>
                Découvrez la galerie en images</h2>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="portfolio-filter-button text-center mb-60 wow fadeInDown">
            <ul class="filter-btn">
                <li class="active" data-filter="*">Tout afficher</li>
                <li data-filter=".cat-1">Vache</li>
                <li data-filter=".cat-2">Légumes</li>
                <li data-filter=".cat-3">Poulet</li>
                <li data-filter=".cat-4">Fruits</li>
                <li data-filter=".cat-5">Poisson de mer</li>
                <li data-filter=".cat-6">Lait & Viandes</li>
            </ul>
        </div>
    </div>
</div>

                <div class="row project-row">
                    <div class="col-lg-4 col-md-6 col-sm-12 project-column cat-1">
                        <div class="project-item-three mb-30 wow fadeInUp">
                            <div class="img-holder">
                                <img src="assets/images/portfolio/img-4.jpg" alt="">
                                <div class="hover-portfolio">
                                    <div class="icon-btn"><a href="portfolio-details.html"><i class="far fa-arrow-right"></i></a></div>
                                    <div class="hover-content">
                                        <h3 class="title"><a href="portfolio-details.html">Golder Wheat</a></h3>
                                        <p><a href="#">Agriculture</a>,<a href="#">Foods</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 project-column cat-2">
                        <div class="project-item-three mb-30 wow fadeInDown">
                            <div class="img-holder">
                                <img src="assets/images/portfolio/img-5.jpg" alt="">
                                <div class="hover-portfolio">
                                    <div class="icon-btn"><a href="portfolio-details.html"><i class="far fa-arrow-right"></i></a></div>
                                    <div class="hover-content">
                                        <h3 class="title"><a href="portfolio-details.html">Organic Grap</a></h3>
                                        <p><a href="#">Agriculture</a>,<a href="#">Foods</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 project-column cat-3">
                        <div class="project-item-three mb-30 wow fadeInUp">
                            <div class="img-holder">
                                <img src="assets/images/portfolio/img-6.jpg" alt="">
                                <div class="hover-portfolio">
                                    <div class="icon-btn"><a href="portfolio-details.html"><i class="far fa-arrow-right"></i></a></div>
                                    <div class="hover-content">
                                        <h3 class="title"><a href="portfolio-details.html">Golder Wheat</a></h3>
                                        <p><a href="#">Agriculture</a>,<a href="#">Foods</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 project-column cat-4">
                        <div class="project-item-three mb-30 wow fadeInDown">
                            <div class="img-holder">
                                <img src="assets/images/portfolio/img-7.jpg" alt="">
                                <div class="hover-portfolio">
                                    <div class="icon-btn"><a href="portfolio-details.html"><i class="far fa-arrow-right"></i></a></div>
                                    <div class="hover-content">
                                        <h3 class="title"><a href="portfolio-details.html">Golder Wheat</a></h3>
                                        <p><a href="#">Agriculture</a>,<a href="#">Foods</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 project-column cat-5">
                        <div class="project-item-three mb-30 wow fadeInUp">
                            <div class="img-holder">
                                <img src="assets/images/portfolio/img-8.jpg" alt="">
                                <div class="hover-portfolio">
                                    <div class="icon-btn"><a href="portfolio-details.html"><i class="far fa-arrow-right"></i></a></div>
                                    <div class="hover-content">
                                        <h3 class="title"><a href="portfolio-details.html">Fresh Chicken</a></h3>
                                        <p><a href="#">Agriculture</a>,<a href="#">Foods</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 project-column cat-6 cat-1">
                        <div class="project-item-three mb-30 wow fadeInDown">
                            <div class="img-holder">
                                <img src="assets/images/portfolio/img-9.jpg" alt="">
                                <div class="hover-portfolio">
                                    <div class="icon-btn"><a href="portfolio-details.html"><i class="far fa-arrow-right"></i></a></div>
                                    <div class="hover-content">
                                        <h3 class="title"><a href="portfolio-details.html">Golder Wheat</a></h3>
                                        <p><a href="#">Agriculture</a>,<a href="#">Foods</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 project-column cat-3 cat-6">
                        <div class="project-item-three mb-30 wow fadeInUp">
                            <div class="img-holder">
                                <img src="assets/images/portfolio/img-10.jpg" alt="">
                                <div class="hover-portfolio">
                                    <div class="icon-btn"><a href="portfolio-details.html"><i class="far fa-arrow-right"></i></a></div>
                                    <div class="hover-content">
                                        <h3 class="title"><a href="portfolio-details.html">Organic Cow</a></h3>
                                        <p><a href="#">Agriculture</a>,<a href="#">Foods</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 project-column cat-2 cat-5">
                        <div class="project-item-three mb-30 wow fadeInDown">
                            <div class="img-holder">
                                <img src="assets/images/portfolio/img-11.jpg" alt="">
                                <div class="hover-portfolio">
                                    <div class="icon-btn"><a href="portfolio-details.html"><i class="far fa-arrow-right"></i></a></div>
                                    <div class="hover-content">
                                        <h3 class="title"><a href="portfolio-details.html">Golder Wheat</a></h3>
                                        <p><a href="#">Agriculture</a>,<a href="#">Foods</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12 project-column cat-4">
                        <div class="project-item-three mb-30 wow fadeInUp">
                            <div class="img-holder">
                                <img src="assets/images/portfolio/img-12.jpg" alt="">
                                <div class="hover-portfolio">
                                    <div class="icon-btn"><a href="portfolio-details.html"><i class="far fa-arrow-right"></i></a></div>
                                    <div class="hover-content">
                                        <h3 class="title"><a href="portfolio-details.html">Golder Sunflower</a></h3>
                                        <p><a href="#">Agriculture</a>,<a href="#">Foods</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-lg-12">
                        <div class="button-box text-center mt-30 wow fadeInDown">
                            <a href="portfoloio-grid.html" class="main-btn bordered-btn bordered-yellow">View More Projects</a>
                        </div>
                    </div>
                </div> --}}
            </div>
        </section><!--====== End Portfolio Grid Page ======-->
@endsection
