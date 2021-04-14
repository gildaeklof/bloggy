@include('header')
@include('success')
<main class="container mt-5">
    <h1 class="text-center pb-5">My bloggy</h1>

    <ul class="nav nav-tabs justify-content-center mb-5">
        <li class="nav-item">
            <a class="nav-link text-uppercase {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" href="/">All posts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase  {{ (request()->is('lifestyle')) ? 'active' : '' }}" aria-current="page"  href="/lifestyle">Lifestyle</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase {{ (request()->is('fashion')) ? 'active' : '' }}" aria-current="page" href="/fashion">Fashion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase {{ (request()->is('interior')) ? 'active' : '' }}" aria-current="page" href="/interior">Interior</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-uppercase {{ (request()->is('food')) ? 'active' : '' }}" aria-current="page"  href="/food">Food</a>
        </li>
    </ul>

    @include('posts')
</main>

@include('footer')
