@include('header')

<section class="container">
    <p>My bloggy</p>

    <ul class="">
        <li class="nav-item">
            <a class="nav-link" href="/">All posts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/lifestyle">Lifestyle</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/fashion">Fashion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/interior">Interior</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="/food">Food</a>
        </li>
    </ul>

    @include('posts')
</section>