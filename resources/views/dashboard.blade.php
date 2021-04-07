@include('header')

Hello, {{ $user->name }}!

@include('errors')

<form class="m-3" action="/posts" method="post">
    @csrf
    <div class="form-group w-50">
        <label for="title">title</label>
        <input class="form-control" name="title" id="title" type="text">
    </div>
    <div class="form-group w-50">
        <label for="description">Description</label>
        <input class="form-control" name="description" id="description" type="text">
    </div>
    <div class="form-group w-50">
        <label for="image">image</label>
        <input class="form-control" name="image" id="image" type="file">
    </div>
    <div class="form-group w-50">
        <label for="category">category</label>
        <input class="form-control" name="category" id="category" type="text">
    </div>
    <button class="btn btn-primary" type="submit">Create post</button>
</form>

<ul>
    @foreach ($user->posts as $post)
    <li>
        {{$post->title}}
        {{$post->description}}
    </li>
    @endforeach
</ul>
