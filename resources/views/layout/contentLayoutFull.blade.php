<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('img/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon_io/site.webmanifest') }}">
    <title>@yield('title') - {{ env('APP_NAME') }}</title>

    @vite([
        'resources/css/app.css',
        'resources/css/custom-style.css',
        'resources/css/page-auth.css'
        ])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" id="theme-core" href="{{ asset('css/core.css') }}">
    <link rel="stylesheet" id="theme-theme" href="{{ asset('css/theme-default.css') }}">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Styles -->
    @yield('page-styles')
</head>
<body>
    @yield('content')
    
    @vite([
        'resources/js/app.js',
        'resources/js/main.js',
                ])
    @yield('page-script')
</body>
</html>