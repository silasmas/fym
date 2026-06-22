<section class="features-section">
  <div class="container-1350">
    <div class="features-wrap-one wow fadeInUp">
      <div class="row justify-content-center">
        <div class="col-xl-4 col-md-6 col-sm-12">
          <div class="features-item d-flex mb-30">
            <div class="fill-number">01</div>
            <div class="icon"><i class="flaticon-social-care"></i></div>
            <div class="text">
              <h5>Actions humanitaires</h5>
              <p>Aide directe aux populations vulnérables sur le territoire congolais.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 col-sm-12">
          <div class="features-item d-flex mb-30">
            <div class="fill-number">02</div>
            <div class="icon"><i class="flaticon-agriculture"></i></div>
            <div class="text">
              <h5>Projets durables</h5>
              <p>Initiatives sociales et éducatives à impact à long terme.</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6 col-sm-12">
          <div class="features-item d-flex mb-30">
            <div class="fill-number">03</div>
            <div class="icon"><i class="flaticon-placeholder"></i></div>
            <div class="text">
              <h5>Engagement local</h5>
              <p>Une fondation apolitique et non confessionnelle au service de tous.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="about-section p-r z-1 pt-130 pb-80">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-xl-5 col-lg-6">
        <div class="about-one_content-box mb-50">
          <div class="section-title section-title-left mb-30 wow fadeInUp">
            <span class="sub-title">À propos</span>
            <h2>Fondation Yves Milan Ngangay</h2>
          </div>
          <div class="quote-text mb-35 wow fadeInDown" data-wow-delay=".3s">
            <p>{{ $settings['about_intro'] ?? 'Association caritative œuvrant pour le bien-être des communautés.' }}</p>
          </div>
          <div class="tab-content-box wow fadeInUp">
            <ul class="nav nav-tabs mb-20">
              <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#mission">Notre mission</a></li>
              <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#vision">Notre vision</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="mission">
                <p>{{ $settings['about_mission'] ?? '' }}</p>
              </div>
              <div class="tab-pane fade" id="vision">
                <p>{{ $settings['about_vision'] ?? '' }}</p>
              </div>
            </div>
          </div>
          <div class="mt-30">
            <a href="{{ route('about') }}" class="main-btn btn-yellow">En savoir plus</a>
          </div>
        </div>
      </div>
      <div class="col-xl-7 col-lg-6">
        <div class="about-one_image-box p-r mb-50 pl-100">
          <div class="about-img_one wow fadeInLeft">
            <img src="{{ asset('assets/images/OK.jpg') }}" alt="Fondation Yves Milan">
          </div>
          <div class="about-img_two wow fadeInRight">
            <img src="{{ asset('assets/images/470x625.jpg') }}" alt="Actions humanitaires FYM">
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
