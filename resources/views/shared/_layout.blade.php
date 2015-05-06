<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Homepage of Tich Showers">
    <meta name="author" content="Tich Showers">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="tich,showers,vaporeon">
    <meta charset="UTF-8">
    <title>@yield('title') | tich.tv</title>

    <style>
        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
<div class="container">
    @include('shared._nav')

    @yield('content')
</div>

@yield('scripts')
</body>
</html>
