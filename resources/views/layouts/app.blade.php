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
</body>
</html>
