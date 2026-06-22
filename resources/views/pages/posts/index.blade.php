@extends('layouts.template')

@section('content')
@include('parties.menu2')
@include('parties.banniere')

<section class="blog-standard-section pt-170 pb-90">
  <div class="container">
    <div class="row">
      @forelse($posts as $post)
        <div class="col-lg-4 col-md-6 mb-40">
          <div class="blog-post-item-one">
            @if($post->thumbnail)
              <div class="post-thumbnail">
                <img src="{{ \App\Support\MediaUrl::from($post->thumbnail) }}" alt="{{ $post->title }}">
              </div>
            @endif
            <div class="entry-content">
              <h3 class="title">
                <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
              </h3>
              @if($post->excerpt)
                <p>{{ $post->excerpt }}</p>
              @endif
              <span class="posted-on">{{ $post->published_at?->format('d/m/Y') }}</span>
            </div>
          </div>
        </div>
      @empty
        <div class="col-12 text-center">
          <p>Aucune actualité publiée pour le moment.</p>
        </div>
      @endforelse
    </div>
    <div class="mt-30">
      {{ $posts->links() }}
    </div>
  </div>
</section>

@endsection
