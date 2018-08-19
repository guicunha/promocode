<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href={{ URL::to("css/app.css") }}>
    <link rel="stylesheet" href={{ URL::to("css/promocode.css") }}>
</head>
<body>
<div class="gradient-pattern"></div>
<div class="container">
    @yield('content')
</div>
<script src=href={{ URL::to("js/app.js") }}></script>
</body>
</html>
