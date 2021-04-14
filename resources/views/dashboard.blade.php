@include('header')
<main class="container mt-5">
    <p class="m-3 h3">Hello, {{ $user->name }}!</p>
    @include('errors')
    @include('success')
    <div class="d-flex flex-column align-items-center">
        <div class="card m-2 mb-3 pb-3 w-100">
            <div class="card-body p-lg-5">
                <h1 class="ml-3  pb-2"><u>Create a new post</u></h1>
                <form class="m-lg-3 m-sm-2" action="posts" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group w-lg-50">
                        <label for="title">Title</label>
                        <input class="form-control" name="title" id="title" type="text">
                    </div>
                    <div class="form-group w-lg-75">
                        <label for="description">Description</label>
                        <textarea rows="5" class="form-control" name="description" id="description" type="text"></textarea>
                    </div>
                    <div class="form-group w-lg-50">
                        <label for="image">Image</label>
                        <input class="" name="image" id="image" type="file">
                    </div>
                    <div class="form-group w-lg-50">
                        <label for="category">Select category: </label>
                        <select class="" name="category" id="category">
                            <option value="food">Food</option>
                            <option value="ashion">Fashion</option>
                            <option value="lifestyle">Lifestyle</option>
                            <option value="interior">Interior</option>
                        </select>
                    </div>
                    <button class="btn btn-dark" type="submit">Create post</button>
                </form>
            </div>
        </div>
    </div>

    <div class="accordion" id="accordionExample">
        @foreach ($user->posts->sortDesc() as $post)
        <div class="card">
            <div class="card-header" id="heading{{$post->id}}" data-toggle="collapse" data-target="#collapse{{$post->id}}" aria-expanded="true" aria-controls="collapse{{$post->id}}"">
            <h2 class=" mb-0">
                {{$post->title}}
                <button class="btn btn-link-dark" type="button" data-toggle="collapse" data-target="#collapse{{$post->id}}" aria-expanded="true" aria-controls="collapse{{$post->id}}">
                    Edit post
                </button>
                </h2>
            </div>
            <div id="collapse{{$post->id}}" class="collapse" aria-labelledby="heading{{$post->id}}" data-parent="#accordionExample">
                <div class="card-body p-lg-5">
                    <form action="posts/{{$post->id}}/edit" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group w-lg-25">
                            <label for="title">Title</label>
                            <input class="form-control" name="title" id="title" type="text" value="{{$post->title}}">
                        </div>
                        <div class="form-group w-lg-75">
                            <label for="description">Description</label>
                            <textarea rows="5" class="form-control" name="description" id="description" type="text">{{$post->description}}</textarea>
                        </div>
                        <img class="card-img-top pb-2" src="{{$post->image}}">
                        <div class="form-group w-lg-50">
                            <label for="image">Image</label>
                            <input class="" name="image" id="image" type="file" value="{{$post->image}}">
                        </div>
                        <div class="form-group w-lg-50">
                            <label for="category">Select category: </label>
                            <select class="" name="category" id="category">
                                <option>{{$post->category}}</option>
                                <option value="Food">Food</option>
                                <option value="Fashion">Fashion</option>
                                <option value="Lifestyle">Lifestyle</option>
                                <option value="Interior">Interior</option>
                            </select>
                        </div>
                        <button class="btn btn-dark mb-2" type="submit">Save changes</button>
                    </form>
                    <form action="posts/{{$post->id}}/delete" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete post</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@include('footer')
