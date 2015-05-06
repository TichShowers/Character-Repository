<nav>
    <ul>
        <li>
            <a href="/">Home</a>
        </li>
        @foreach($socials as $social)
            <li class="{{ $social->css }}">
                <a href="{{ $social->link }}">{{ $social->type }}</a>
            </li>
        @endforeach
    </ul>
</nav>