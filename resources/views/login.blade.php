@include('header')

@include('errors')

<main class="d-flex justify-content-center flex-column mt-5">
    <div class="card m-2 pb-3 w-lg-25 align-self-center">
        <div class="card-body text-center">
            <h1 class="pb-4"><u>Log in</u></h1>
            <form action="/login" method="post">
                @csrf
                <div class="form-group w-100">
                    <label for="email">Email</label>
                    <input placeholder="name@mail.com" class="form-control" name="email" id="email" type="email" value="{{Session::pull('email', '')}}" />
                </div>
                <div class="form-group w-100">
                    <label for="password">Password</label>
                    <input class="form-control" name="password" id="password" type="password" />
                </div>
                <button class="btn btn-dark pr-4 pl-4" type="submit">Login</button>
            </form>
        </div>
    </div>
</main>

@include('footer')
