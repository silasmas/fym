<section class="farmers-team_two light-gray-bg pb-90">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-lg-8 col-md-9">
        <div class="section-title section-title-left mb-60 wow fadeInLeft">
          <span class="sub-title">Notre équipe</span>
          <h2>Les membres engagés de la fondation</h2>
        </div>
      </div>
    </div>
    <div class="row">
      @forelse($teamMembers as $index => $member)
        <div class="col-xl-3 col-md-6 col-sm-12">
          <div class="team-member_one text-center mb-40 wow {{ $index % 2 === 0 ? 'fadeInUp' : 'fadeInDown' }}">
            <div class="member-img">
              <img src="{{ \App\Support\MediaUrl::from($member->photo) ?? asset('assets/images/team/img-1.jpg') }}" alt="{{ $member->name }}">
            </div>
            <div class="member-info">
              <h4>{{ $member->name }}</h4>
              @if($member->role)
                <p class="position">{{ $member->role }}</p>
              @endif
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center">
          <p>Aucun membre d'équipe publié pour le moment.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>
