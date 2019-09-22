<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Serabutan | @yield('title')</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{ secure_asset('css/app.css') }}">
    <style>
        .btn {
            padding: 0.275rem 1.75rem;
        }

        .h-100 {
            min-height: 100vh;
        }

        .btn-indigo {
            background-color: #f66d9b;
            color: white;
        }
    </style>
</head>
<body>

    <div class="py-3">
        <div class="container h-100">
            @yield('content')
        </div>
    </div>

    <script src="{{ secure_asset('js/app.js')}}"></script>
    <script>
        $('.card-body').hide();
        $('.card-body:first-child').show();
        $('.card-img-top').click(function (e) { 
            e.preventDefault();
            $(this).next().slideToggle();
        });
    </script>
    @stack('scripts')
</body>
</html>