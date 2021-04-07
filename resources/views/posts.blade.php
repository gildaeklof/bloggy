@foreach ($posts->sortDesc() as $post)
 <div class="card m-2">
    <img class="card-img-top" src="{{$post->image}}">
    <div class="card-body">
        <h2>{{$post->title}}</h2>
        <p>{{$post->category}}</p>
        <p>{{$post->created_at}}</p>
        <p>{{$post->description}}</p>
    </div>
 </div>
@endforeach
