@include('header')

@include('errors')

<form action="/login" method="post">
    @csrf
    <div class="form-group w-50">
        <label for="email">Email</label>
        <input class="form-control" name="email" id="email" type="email" />
    </div>
    <div class="form-group w-50">
        <label for="password">Password</label>
        <input class="form-control" name="password" id="password" type="password" />
    </div>
    <button class="btn btn-primary" type="submit">Login</button>
</form>
