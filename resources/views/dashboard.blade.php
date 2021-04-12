@include('header')

<body>
    Hello, {{ $user->name }}!
    @include('errors')
    @include('success')
    <form class="m-3" action="posts" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group w-50">
            <label for="title">Title</label>
            <input class="form-control" name="title" id="title" type="text">
        </div>
        <div class="form-group w-50">
            <label for="description">Description</label>
            <input class="form-control" name="description" id="description" type="text">
        </div>
        <div class="form-group w-50">
            <label for="image">Image</label>
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
        </div>
        <button class="btn btn-primary" type="submit">Create post</button>
    </form>
    <ul>
        @foreach ($user->posts->sortDesc() as $post)
        <li class="m-3">
            <form action="posts/{{$post->id}}/edit" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group w-50">
                    <label for="title">Title</label>
                    <input class="form-control" name="title" id="title" type="text" value="{{$post->title}}">
                </div>
                <div class="form-group w-50">
                    <label for="description">Description</label>
                    <input class="form-control" name="description" id="description" type="text" value="{{$post->description}}">
                </div>
                <img src="{{$post->image}}">
                <div class="form-group w-50">
                    <label for="image">Image</label>
                    <input class="form-control" name="image" id="image" type="file" value="{{$post->image}}">
                </div>
                <div class="form-group w-50">
                    <label for="category">Select category: </label>
                    <select class="" name="category" id="category">
                        <option value="food">Food</option>
                        <option value="fashion">Fashion</option>
                        <option value="lifestyle">Lifestyle</option>
                        <option value="interior">Iterior</option>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit">Save</button>
            </form>
            {{-- <h2>{{$post->title}}</h2>
            <p>{{$post->category}}</p>
            <p>{{$post->created_at}}</p>
            <p>{{$post->description}}</p>
            <img src="{{$post->image}}"> --}}
            <form action="posts/{{$post->id}}/delete" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Delete</button>
            </form>
            {{-- <form action="posts/{{$post->id}}/edit" method="post">
            @csrf
            @method('edit')
            <button class="btn ">Edit</button>
            </form --}} </li>
            @endforeach
    </ul>
</body>