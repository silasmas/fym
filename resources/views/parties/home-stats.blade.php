<section class="fun-fact">
  <div class="big-text mb-105 wow fadeInUp"><h2>Nos chiffres</h2></div>
  <div class="container">
    <div class="counter-wrap-one wow fadeInDown">
      <div class="counter-inner-box">
        <div class="row">
          @for($i = 1; $i <= 4; $i++)
            <div class="col-lg-3 col-md-6 col-sm-12 counter-item">
              <div class="counter-inner">
                <div class="text">
                  <h2 class="number"><span class="count">{{ $settings['stat_'.$i.'_value'] ?? '0' }}</span>+</h2>
                  <p>{{ $settings['stat_'.$i.'_label'] ?? '' }}</p>
                </div>
              </div>
            </div>
          @endfor
        </div>
      </div>
    </div>
  </div>
</section>
