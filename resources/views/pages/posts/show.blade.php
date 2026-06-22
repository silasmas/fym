@extends('layouts.template')

@section('content')
@include('parties.menu2')
@include('parties.banniere')

<section class="blog-details-section pt-170 pb-90">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        @if($post->thumbnail)
          <img src="{{ \App\Support\MediaUrl::from($post->thumbnail) }}" alt="{{ $post->title }}" class="mb-40 w-100">
        @endif
        <h1 class="mb-20">{{ $post->title }}</h1>
        <p class="mb-30 text-muted">{{ $post->published_at?->format('d F Y') }}</p>
        @if($post->categories->isNotEmpty())
          <p class="mb-30">
            @foreach($post->categories as $category)
              <span class="cat-btn">{{ $category->name }}</span>
            @endforeach
          </p>
        @endif
        <div class="post-content">
          {!! $post->content !!}
        </div>
        <a href="{{ route('posts.index') }}" class="main-btn btn-yellow mt-40">Retour aux actualités</a>
      </div>
    </div>
  </div>
</section>

@endsection
