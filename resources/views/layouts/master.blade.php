<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .btn {
            padding: 0.275rem 1.75rem;
        }
    </style>
</head>
<body>

    @yield('content')

    <script src="{{ asset('js/app.js')}}"></script>
    <script>
        $('.card-body').hide();
        $('.card-body:first-child').show();
        $('.card-img-top').click(function (e) { 
            e.preventDefault();
            $(this).next().slideToggle();
        });
    </script>
</body>
</html>