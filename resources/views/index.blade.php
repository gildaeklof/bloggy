@include('header')

<section class="container">
<p>My bloggy</p>

<ul class="">
    <li class="nav-item">
        <a class="nav-link" href="/?category=lifestyle">Lifestyle</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/">Fashion</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/logout">Interior</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/login">Food</a>
    </li>
</ul>

@include('posts')
</section>
