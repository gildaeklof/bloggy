@include('header')

Hello, {{ $user->name }}!

@include('errors')
@include('success')

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
        <label for="category">Select category: </label>
        <select class="" name="category" id="category">
            <option value="food">Food</option>
            <option value="fashion">Fashion</option>
            <option value="lifestyle">Lifestyle</option>
            <option value="interior">Iterior</option>
        </select>
        <!--<input class="form-control" name="category" id="category" type="text">-->
    </div>
    <button class="btn btn-primary" type="submit">Create post</button>
</form>

<ul>
    @foreach ($user->posts as $post)
    <li>
        <h2>{{$post->title}}</h2>
        <p>{{$post->created_at}}</p>
        <p>{{$post->description}}</p>
        <img src="{{$post->image}}">
        <form action="posts/{{$post->id}}/delete" method="post">
            @csrf
            @method('delete')
            <button>Delete</button>
        </form>
    </li>

    @endforeach
</ul>
