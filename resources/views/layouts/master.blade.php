<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Serabutan</title>
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    <style>
        .h-100 {
            min-height: 100vh;
        }
    </style>
</head>
<body>
    @yield('content')
    <script src="{{ secure_asset('js/app.js') }}"></script>
</body>
</html>