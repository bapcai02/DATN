<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Index</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta name="keywords" content="blog, business, clean, clear, cooporate, creative, design web, flat, marketing, minimal, portfolio, shop, shopping, unique">
    <meta name="author" content="MARTECH | Deer Creative Theme">
    <link rel="stylesheet" href="{{ asset('HTML/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('HTML/assets/css/custom_bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('HTML/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('HTML/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('HTML/assets/css/elegant.css') }}">
    <link rel="stylesheet" href="{{ asset('HTML/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('HTML/assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('HTML/assets/css/scroll.css') }}">
    <link rel="stylesheet" href="{{ asset('HTML/assets/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('HTML/assets/css/jquery.fancybox.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('HTML/assets/images/shortcut_logo.png') }}">
  </head>
  <body>
    <div id="main">
        @include('fontend.partials.header')
        <!-- End header-->
        @yield('content')
        <!-- End partner-->
        @include('fontend.partials.footer')
        <!-- End footer-->
      </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('HTML/assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('HTML/assets/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('HTML/assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('HTML/assets/js/jquery.easing.js') }}"></script>
    <script src="{{ asset('HTML/assets/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('HTML/assets/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('HTML/assets/js/parallax.js') }}"></script>
    <script src="{{ asset('HTML/assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('HTML/assets/js/numscroller-1.0.js') }}"></script>
    <script src="{{ asset('HTML/assets/js/vanilla-tilt.min.js') }}"></script>
    <script src="{{ asset('HTML/assets/js/main.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    @stack('script')
  </body>
</html>