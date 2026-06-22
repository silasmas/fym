  @php
    $seo = $seo ?? \App\Support\Seo::make($pageTitle ?? null, $settings['seo_default_description'] ?? null);
  @endphp
  <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>{{ $seo['title'] }}</title>
        <meta name="description" content="{{ $seo['description'] }}">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{ $seo['url'] }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="{{ $seo['title'] }}">
        <meta property="og:description" content="{{ $seo['description'] }}">
        <meta property="og:url" content="{{ $seo['url'] }}">
        <meta property="og:image" content="{{ $seo['image'] }}">
        <meta property="og:locale" content="fr_FR">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seo['title'] }}">
        <meta name="twitter:description" content="{{ $seo['description'] }}">
        <meta name="twitter:image" content="{{ $seo['image'] }}">
        <link rel="shortcut icon" href="{{ asset('assets/images/fv.ico') }}" type="image/png">
        <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/dist/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/slick/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/nice-select/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/vendor/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/default.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    </head>
     <body>
        <div class="preloader">
            <div class="loader">
                <div class="pre-shadow"></div>
                <div class="pre-box"></div>
            </div>
        </div>
