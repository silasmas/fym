<!--====== Start Blog Section ======-->
<section class="blog-section p-r z-1 pt-130 pb-100">
  <div class="container">
    <div class="row align-items-end">
      <div class="col-xl-7 col-lg-10">
        <div class="section-title section-title-left mb-60 wow fadeInLeft">
          <span class="sub-title">Actualités</span>
          <h2>Dernières nouvelles de la fondation</h2>
        </div>
      </div>
      <div class="col-lg-5">
        <div class="button-box float-lg-right mb-60 wow fadeInRight">
          <a href="{{ route('posts.index') }}" class="main-btn bordered-btn bordered-yellow">Voir toutes les actualités</a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        @forelse($posts as $index => $post)
          <div class="blog-post-item-one mb-30 wow {{ $index % 2 === 0 ? 'fadeInLeft' : 'fadeInRight' }}">
            @if($post->thumbnail)
              <div class="post-thumbnail">
                <img src="{{ \App\Support\MediaUrl::from($post->thumbnail) }}" alt="{{ $post->title }}">
              </div>
            @endif
            <div class="entry-content">
              @if($post->categories->isNotEmpty())
                <a href="{{ route('posts.show', $post->slug) }}" class="cat-btn">{{ $post->categories->first()->name }}</a>
              @endif
              <h3 class="title">
                <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
              </h3>
              <div class="post-meta">
                <ul>
                  <li>
                    <span>
                      <i class="far fa-calendar-alt"></i>
                      <a href="{{ route('posts.show', $post->slug) }}">{{ $post->published_at?->format('d/m/Y') }}</a>
                    </span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        @empty
          <p class="text-center">Aucune actualité publiée pour le moment.</p>
        @endforelse
      </div>
    </div>
  </div>
</section>
<!--====== End Blog Section ======-->
