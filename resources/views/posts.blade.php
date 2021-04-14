@forelse ($posts->sortDesc() as $post)
<div class="card m-2 pb-3">
    <img class="card-img-top" src="{{$post->image}}">
    <div class="card-body">
        <h2>{{$post->title}}</h2>
        <p>{{$post->category}}</p>
        <p>{{$post->description}}</p>
        <p>{{$post->created_at}}</p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse{{$post->id}}" aria-expanded="false" aria-controls="collapse{{$post->id}}">
            Comments <span class="badge bg-dark">{{$post->comments->count()}}</span>
        </button>
        <section class="collapse" id="collapse{{$post->id}}">
            @include('comments')
        </section>
    </div>
</div>
@empty
<p>No posts in this category.</p>
@endforelse
