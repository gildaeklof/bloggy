<nav class="navbar navbar-expand navbar-white bg-white">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('/')) ? 'text-primary' : 'text-dark' }}" href="/">Home</a>
        </li>
        @if (Auth::check())
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('dashboard')) ? 'text-primary' : 'text-dark' }}" href="/dashboard">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('logout')) ? 'text-primary' : 'text-dark' }}" href="/logout">Logout</a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link {{ (request()->is('login')) ? 'text-primary' : 'text-dark' }}" href="/login">Login</a>
        </li>
        @endif
    </ul>
</nav>


