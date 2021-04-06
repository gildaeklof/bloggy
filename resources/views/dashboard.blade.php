Hello, {{ $user->name }}!

<a href="/logout">Logout</a>
<a href="/">Home</a>

@include('errors')

<form action="/posts" method="post">
    @csrf
    <label for="title">title</label>
    <input name="title" id="title" type="text">
    <label for="description">Description</label>
    <input name="description" id="description" type="text">
    <label for="image">image</label>
    <input name="image" id="image" type="file">
    <label for="category">category</label>
    <input name="category" id="category" type="text">
    <button type="submit">Create post</button>
</form>

<ul>
    @foreach ($user->posts as $post)
    <li>
        {{$post->title}}
        {{$post->description}}
    </li>
    @endforeach
</ul>