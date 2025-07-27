  <head>
        <!--====== Required meta tags ======-->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="portail numérique pour le fondation Yves Milan">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--====== Title ======-->
        <title>{{ config('app.name') }} |{{ isset($titre) ? $titre : '' }}</title>
        <!--====== Favicon Icon ======-->
        <link rel="shortcut icon" href="{{ asset('assets/images/fv.ico') }}" type="image/png">
        <!--====== FontAwesome css ======-->
        <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/all.min.css') }}">
        <!--====== Flaticon css ======-->
        <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/flaticon.css') }} ">
        <!--====== Bootstrap css ======-->
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }} ">
        <!--====== magnific-popup css ======-->
        <link rel="stylesheet" href="{{ asset('assets/vendor/magnific-popup/dist/magnific-popup.css') }} ">
        <!--====== Slick-popup css ======-->
        <link rel="stylesheet" href="{{ asset('assets/vendor/slick/slick.css') }} ">
        <!--====== Nice Select css ======-->
        <link rel="stylesheet" href="{{ asset('assets/vendor/nice-select/css/nice-select.css') }} ">
        <!--====== Animate css ======-->
        <link rel="stylesheet" href="{{ asset('assets/vendor/animate.css') }} ">
        <!--====== Default css ======-->
        <link rel="stylesheet" href="{{ asset('assets/css/default.css') }} ">
        <!--====== Style css ======-->
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }} ">
    </head>
     <body>
        <!--====== Start Preloader ======-->
        <div class="preloader">
            <div class="loader">
                <div class="pre-shadow"></div>
                <div class="pre-box"></div>
            </div>
        </div>
        <!--====== End Preloader ======-->
