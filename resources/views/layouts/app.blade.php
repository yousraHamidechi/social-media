<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>social media</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
    <script src="https://kit.fontawesome.com/ab2d8621ed.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ab2d8621ed.js" crossorigin="anonymous"></script>
</head>
<body>
@include('layouts.partials.navbar')

@yield('content')

@include('layouts.partials.footer')
<script src="{{ asset('assets/homepage.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@stack('js')
</body>
</html>
