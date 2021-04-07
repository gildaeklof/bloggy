<nav class="navbar navbar-expand navbar-light bg-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
        </li>
        @if (Auth::check())
        <li class="nav-item">
            <a class="nav-link" href="/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
        </li>
        @endif
    </ul>
</nav>


