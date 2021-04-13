@foreach ($post->comments as $comment)
<p>{{$comment->name}}</p>
<p>{{$comment->comment}}</p>
<p class="small">{{$comment->created_at}}</p>
@if (Auth::check())
<form action="comment/{{$comment->id}}/delete" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-danger">Delete</button>
</form>
@endif
@endforeach
<form class="m-3" action="/comments" method="post">
    <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}" />
    @csrf
    <div class="form-group w-50">
        <label for="name">Name</label>
        <input class="form-control" name="name" id="name" type="text">
    </div>
    <div class="form-group w-50">
        <label for="comment">Comment</label>
        <input class="form-control" name="comment" id="comment" type="text">
    </div>
    <button class="btn btn-primary" type="submit">Create comment</button>
</form>
