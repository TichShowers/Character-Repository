<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Homepage of Tich Showers">
    <meta name="author" content="Tich Showers">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="tich,showers,vaporeon">
    <meta charset="UTF-8">
    <title>@yield('title') | tich.tv</title>

    <link href='http://fonts.googleapis.com/css?family=Signika:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />

    <link href="/css/site.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="banner"></div>

@include('shared._nav')

<div class="container">
    @yield('content')
</div>

<footer>
    <p>Tich Showers &copy; 2015</p>
    <p>Hosted on the Fairy Network</p>
    <p>Many thanks to <a href="http://www.fairyjonke.com">Jonke</a></p>
    <p>Repository on <a href="https://github.com/TichShowers/Character-Repository">GitHub</a></p>
</footer>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
@yield('scripts')
</body>
</html>
