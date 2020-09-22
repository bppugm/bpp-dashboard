<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    
    {{-- FAVICONS --}}
    <link rel="apple-touch-icon" sizes="180x180" href="{{url('favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{url('favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{url('favicons/site.webmanifest')}}">
    <link rel="mask-icon" href="{{url('favicons/safari-pinned-tab.svg')}}" color="#5bbad5">
    <link rel="shortcut icon" href="{{url('favicons/favicon.ico')}}">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="{{url('favicons/browserconfig.xml')}}">
    <meta name="theme-color" content="#ffffff">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Generated: 2018-03-27 13:25:03 +0200 -->
    <title>{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="font-awesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">

    <!-- Dashboard Core -->
    <link href="css/dashboard.css" rel="stylesheet" />
    <!-- Odometr includes -->
    {{-- <link rel="stylesheet" href="http://github.hubspot.com/odometer/themes/odometer-theme-car.css" /> --}}
    {{-- <script src="http://github.hubspot.com/odometer/odometer.js"></script> --}}
    {{-- <script src="js/odometer.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="css/odometer-theme-default.css"/> --}}

    {{-- PUSHER LIBRARY --}}
    {{-- <script src="https://js.pusher.com/4.1/pusher.min.js"></script> --}}
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
    {{-- @include('script.pusher') --}}

    <style type="text/css">
      .odometer {
        font-size: 2.2rem;
      }
    </style>

  </head>
  <body class="pt-5" >
    <div class="page" id="app">
      <div class="page-main">
        <div class="page-content mt-0">
          <!-- CONTENT -->
          @yield('content')

        </div>
      </div>

      {{-- FOOTER --}}
      @include('layouts.footer')

    </div>
    @include('script.config')

    {{-- Main App Js --}}
    <script src="{{ url(mix('js/app.js')) }}"></script>
  </body>
</html>
