@include('header')

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
                <option value="interior">Interior</option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Create post</button>
    </form>

    <div class="accordion" id="accordionExample">
    @foreach ($user->posts->sortDesc() as $post)
        <div class="card">
          <div class="card-header" id="heading{{$post->id}}" data-toggle="collapse" data-target="#collapse{{$post->id}}" aria-expanded="true" aria-controls="collapse{{$post->id}}"">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$post->id}}" aria-expanded="true" aria-controls="collapse{{$post->id}}">
                Edit post
              </button>
              {{$post->title}}
            </h2>
          </div>
          <div id="collapse{{$post->id}}" class="collapse" aria-labelledby="heading{{$post->id}}" data-parent="#accordionExample">
            <div class="card-body">
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
                <form action="posts/{{$post->id}}/delete" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
          </div>
        </div>
      @endforeach
    </div>
@include('footer')
