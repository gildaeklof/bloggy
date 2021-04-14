@forelse ($posts->sortDesc() as $post)
<div class="card m-2 pb-3">
    <img class="card-img-top" src="{{$post->image}}">
    <div class="card-body">
        <h2 class="text-center font-weight-bold pb-1">{{$post->title}}</h2>
        <div class="d-flex justify-content-center">
            <p class="pr-1 text-uppercase font-weight-bold">{{$post->category}}</p>
            <p class="pl-1 text-black-50">{{$post->created_at}}</p>
        </div>
        <p class="p-2">{{$post->description}}</p>
        <div class="d-flex justify-content-center pt-4">
            <button class="btn btn-dark" type="button" data-toggle="collapse" data-target="#collapse{{$post->id}}" aria-expanded="false" aria-controls="collapse{{$post->id}}">
                Comments <span class="badge bg-dark">{{$post->comments->count()}}</span>
            </button>
        </div>


        <section class="collapse" id="collapse{{$post->id}}">
            @include('comments')
        </section>
    </div>
</div>
@empty
<p>No posts in this category.</p>
@endforelse
