<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$page}} | {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{asset('js/app.js')}}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="">
            @yield('content')
        </main>
    </div>
    <footer class="u-footer text-center text-muted text-muted">
        <p class="h5 mb-0 ml-auto">
            &copy; <?php echo date("Y");?><a class="link-muted" href="https://williescant.co.ke" target="_blank">WilieScant Company</a>. All Rights Reserved.
        </p>
    </footer>
</body>
</html>
