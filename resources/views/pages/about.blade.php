@extends('layouts.template')


@section('content')
@include('parties.menu2')
@include("parties.banniere")
  <!--====== Start About Section ======-->
        <section class="about-section p-r z-1 pt-170 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-content-box content-box-gap mb-50">
                            <div class="section-title section-title-left wow fadeInUp mb-30">
                                <span class="sub-title">About Us</span>
                                <h2>We’re Best Agriculture
                                    & Organic Firms</h2>
                            </div>
                            <p>Natus error sit voluptatem accusantium doloremque laudatium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt</p>
                            <div class="choose-item-list wow fadeInDown">
                                <div class="single-choose-item mb-30">
                                    <div class="text">
                                        <h5>100% Natural Foods</h5>
                                        <p>Accusantium doloremque laudatium, totam rem aperiam
                                            inventore veritatis et quasi architecto beatae </p>
                                    </div>
                                </div>
                                <div class="single-choose-item mb-30">
                                    <div class="text">
                                        <h5>Modern Euipments</h5>
                                        <p>Accusantium doloremque laudatium, totam rem aperiam
                                            inventore veritatis et quasi architecto beatae </p>
                                    </div>
                                </div>
                            </div>
                            <div class="about-button wow fadeInUp">
                                <a href="about.html" class="main-btn btn-yellow">Learn More Us</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-four_image-box text-right p-r mb-50 wow fadeInRight">
                            <img src="{{ asset('assets/images/440x460.jpg') }}" class="about-img_one" alt="">
                            <img src="{{ asset('assets/images/366x276.jpg') }}" class="about-img_two" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section><!--====== End About Section ======-->
        <!--====== Start Why choose Section ======-->
        <section class="why-choose-two p-r z-1 pt-50 pb-90">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-12">
                        <div class="choose-two_content-box">
                            <div class="section-title section-title-left mb-40 wow fadeInLeft">
                                <span class="sub-title">Why Choose Us</span>
                                <h2>Very Much Professional
                                    Growing Company</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-12">
                        <div class="row pl-lg-70">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="single-chart-item text-center mb-40 wow fadeInUp">
                                    <div class="chart-circle">
                                        <div class="circle" data-donutty data-thickness='5' data-padding='0'  data-value='75' data-bg="rgba(255, 255, 255, 0.149)" data-round=false data-color="#eece38"></div>
                                        <h2 class="number">75<span class="sign">%</span></h2>
                                    </div>
                                    <div class="text">
                                        <h5>Organic Foods
                                            Provides</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="single-chart-item text-center mb-40 wow fadeInDown">
                                    <div class="chart-circle">
                                        <div class="circle" data-donutty data-thickness='5' data-padding='0'  data-value='86' data-bg="rgba(255, 255, 255, 0.149)" data-round=false data-color="#eece38"></div>
                                        <h2 class="number">86<span class="sign">%</span></h2>
                                    </div>
                                    <div class="text">
                                        <h5>Reforming The
                                            Systems</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="single-chart-item text-center mb-40 wow fadeInUp">
                                    <div class="chart-circle">
                                        <div class="circle" data-donutty data-thickness='5' data-padding='0'  data-value='53' data-bg="rgba(255, 255, 255, 0.149)" data-round=false data-color="#eece38"></div>
                                        <h2 class="number">53<span class="sign">%</span></h2>
                                    </div>
                                    <div class="text">
                                        <h5>Eco Fridendly
                                            Farming</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--====== End Why choose Section ======-->
        <!--====== Start Partners Section ======-->
        <section class="partners-section">
            <div class="container-1350">
                <div class="partners-wrap-two yellow-bg pb-60 pt-50 p-r z-1">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section-title text-center mb-30 wow fadeInUp">
                                <h4>We Have More Then 1235+ Global Partners</h4>
                            </div>
                        </div>
                    </div>
                    <div class="partner-slider-one wow fadeInDown">
                        <div class="partner-item">
                            <div class="partner-img">
                                <img src="assets/images/partner/img-1.png" alt="partner image">
                            </div>
                        </div>
                        <div class="partner-item">
                            <div class="partner-img">
                                <img src="assets/images/partner/img-2.png" alt="partner image">
                            </div>
                        </div>
                        <div class="partner-item">
                            <div class="partner-img">
                                <img src="assets/images/partner/img-3.png" alt="partner image">
                            </div>
                        </div>
                        <div class="partner-item">
                            <div class="partner-img">
                                <img src="assets/images/partner/img-4.png" alt="partner image">
                            </div>
                        </div>
                        <div class="partner-item">
                            <div class="partner-img">
                                <img src="assets/images/partner/img-5.png" alt="partner image">
                            </div>
                        </div>
                        <div class="partner-item">
                            <div class="partner-img">
                                <img src="assets/images/partner/img-6.png" alt="partner image">
                            </div>
                        </div>
                        <div class="partner-item">
                            <div class="partner-img">
                                <img src="assets/images/partner/img-3.png" alt="partner image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> <!--====== End Partners Section ======-->
        <!--====== Start Farmers Section ======-->
        <section class="farmers-team_two light-gray-bg pb-90">
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="section-title section-title-left mb-50 wow fadeInLeft">
                            <span class="sub-title">Our Farmers</span>
                            <h2>We Have Lot’s Of Experience
                                Team Members</h2>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="team-button float-lg-right mb-60 wow fadeInRight">
                            <a href="farmers.html" class="main-btn bordered-btn bordered-yellow">Become a Member</a>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="team-member_one text-center mb-40 wow fadeInUp">
                            <div class="member-img">
                                <img src="assets/images/team/img-1.jpg" alt="">
                            </div>
                            <div class="member-info">
                                <h3 class="title"><a href="farmers.html">Dennis P. Russell</a></h3>
                                <p class="position">Food Farmers</p>
                                <ul class="social-link">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="team-member_one text-center mb-40 wow fadeInDown">
                            <div class="member-img">
                                <img src="assets/images/team/img-2.jpg" alt="">
                            </div>
                            <div class="member-info">
                                <h3 class="title"><a href="farmers.html">David M. Hower</a></h3>
                                <p class="position">General Manager</p>
                                <ul class="social-link">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="team-member_one text-center mb-40 wow fadeInUp">
                            <div class="member-img">
                                <img src="assets/images/team/img-3.jpg" alt="">
                            </div>
                            <div class="member-info">
                                <h3 class="title"><a href="farmers.html">Richard M. Howell</a></h3>
                                <p class="position">Food Farmers</p>
                                <ul class="social-link">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="team-member_one text-center mb-40 wow fadeInDown">
                            <div class="member-img">
                                <img src="assets/images/team/img-4.jpg" alt="">
                            </div>
                            <div class="member-info">
                                <h3 class="title"><a href="farmers.html">Keneth R. Williams</a></h3>
                                <p class="position">Food Farmers</p>
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
        </section><!--====== End Farmers Section ======-->
        <!--====== Start Testimonial Section ======-->
        <section class="testimonial-section pt-130">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-10">
                        <div class="section-title text-center mb-60 wow fadeInUp">
                            <span class="sub-title">Clients Feedback</span>
                            <h2>What’s Our Clients Say About
                                Our Organic Foods</h2>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slider-one">
                    <div class="testimonial-item text-center wow fadeInDown">
                        <div class="author-thumb">
                            <img src="assets/images/testimonial/img-1.jpg" alt="author Image">
                        </div>
                        <div class="testimonial-content">
                            <p>“Sit amet consectetu escing elit sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Quis ipsum suspendisse ultrices gravic darisus comoe” </p>
                            <div class="quote"><i class="fas fa-quote-right"></i></div>
                            <div class="author-title">
                                <h4>Michael R. Jordan</h4>
                                <p class="position">CEO & Founder</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item text-center wow fadeInUp">
                        <div class="author-thumb">
                            <img src="assets/images/testimonial/img-2.jpg" alt="author Image">
                        </div>
                        <div class="testimonial-content">
                            <p>“Sit amet consectetu escing elit sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Quis ipsum suspendisse ultrices gravic darisus comoe” </p>
                            <div class="quote"><i class="fas fa-quote-right"></i></div>
                            <div class="author-title">
                                <h4>Nathan A. Caswell</h4>
                                <p class="position">Senior Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item text-center wow fadeInDown">
                        <div class="author-thumb">
                            <img src="assets/images/testimonial/img-3.jpg" alt="author Image">
                        </div>
                        <div class="testimonial-content">
                            <p>“Sit amet consectetu escing elit sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Quis ipsum suspendisse ultrices gravic darisus comoe” </p>
                            <div class="quote"><i class="fas fa-quote-right"></i></div>
                            <div class="author-title">
                                <h4>Somalia D. Silva</h4>
                                <p class="position">Business Manager</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item text-center wow fadeInUp">
                        <div class="author-thumb">
                            <img src="assets/images/testimonial/img-4.jpg" alt="author Image">
                        </div>
                        <div class="testimonial-content">
                            <p>“Sit amet consectetu escing elit sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Quis ipsum suspendisse ultrices gravic darisus comoe” </p>
                            <div class="quote"><i class="fas fa-quote-right"></i></div>
                            <div class="author-title">
                                <h4>Michael D. Slaughter</h4>
                                <p class="position">Web Developer</p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-item text-center wow fadeInDown">
                        <div class="author-thumb">
                            <img src="assets/images/testimonial/img-2.jpg" alt="author Image">
                        </div>
                        <div class="testimonial-content">
                            <p>“Sit amet consectetu escing elit sed do eiusmod tempor incididunt ut labore dolore magna aliqua. Quis ipsum suspendisse ultrices gravic darisus comoe” </p>
                            <div class="quote"><i class="fas fa-quote-right"></i></div>
                            <div class="author-title">
                                <h4>Nathan A. Caswell</h4>
                                <p class="position">Senior Manager</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!--====== End Testimonial Section ======-->
        <!--====== Start Counter Section ======-->
        <section class="fun-fact-one pt-30 pb-130">
            <div class="big-text mb-75 wow fadeInUp"><h2>Statistics</h2></div>
            <div class="container">
                <div class="counter-wrap-one wow fadeInDown">
                    <div class="counter-inner-box">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-12 counter-item">
                                <div class="counter-inner">
                                    <div class="text">
                                        <h2 class="number"><span class="count">3652</span>+</h2>
                                        <p>Saticfied Clients</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 counter-item">
                                <div class="counter-inner">
                                    <div class="text">
                                        <h2 class="number"><span class="count">896</span>+</h2>
                                        <p>Modern Equipment</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 counter-item">
                                <div class="counter-inner">
                                    <div class="text">
                                        <h2 class="number"><span class="count">945</span>+</h2>
                                        <p>Expert Team Members</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-12 counter-item">
                                <div class="counter-inner">
                                    <div class="text">
                                        <h2 class="number"><span class="count">565</span>+</h2>
                                        <p>Tons of Harvest</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--====== End Counter Section ======-->
@endsection
