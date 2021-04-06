<p>My bloggy</p>

@if (Auth::check())
<a href="/dashboard">Dashboard</a>
@else
<a href="/login">Login</a>
@endif