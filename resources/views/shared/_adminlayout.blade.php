<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Homepage of Tich Showers">
    <meta name="author" content="Tich Showers">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="tich,showers,vaporeon">
    <meta charset="UTF-8">
    <title>@yield('title') - Administration page</title>

    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/local.css" />
    <link rel="stylesheet" type="text/css" href="/css/admin.css" />

</head>
<body>

<div id="wrapper">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('admin.character.index') }}">@yield('title') Administration Panel</a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="active" class="nav navbar-nav side-nav">
                    <li {!! Request::is('admin/character*') ? ' class="selected"' : '' !!}><a href="{{ route('admin.character.index') }}"><i class="glyphicon glyphicon-th-list"></i> Characters</a></li>
                    <li {!! Request::is('admin/user*') ? ' class="selected"' : '' !!}><a href="{{ route('admin.user.index') }}"><i class="glyphicon glyphicon-user"></i> Users</a></li>
                    <li {!! Request::is('admin/image*') ? ' class="selected"' : '' !!}><a href="{{ route('admin.image.index') }}"><i class="glyphicon glyphicon-picture"></i> Images</a></li>
                    <li {!! Request::is('admin/social-link*') ? ' class="selected"' : '' !!}><a href="{{ route('admin.social-link.index') }}"><i class="glyphicon glyphicon-share-alt"></i> Social Media</a></li>
                </ul>

                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li>
                        <a href="#">Welcome {{ Auth::user()->username }}</a>
                    </li>
                    <li>
                        <a href="/">Back to Website</a>
                    </li>
                    <li>
                        <a href="/logout" data-post="true">Log out</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
           @yield('content')
        </div>

    </div>
<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script>
<script type="text/javascript" src="/js/formsubmitter.js"></script>
@yield('scripts')
</body>
</html>
