
<div class="container  mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col m-5">
            @foreach ($post->comments as $comment)
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="user d-flex flex-row align-items-center"><span><small class="font-weight-bold text-primary pr-2">{{$comment->name}}</small> <small class="font-weight-bold">{{$comment->comment}}</small></span> </div> <small>{{$comment->created_at}}</small>
                </div>
                <div class="action d-flex justify-content-start mt-2 align-items-center">
                    @if (Auth::check())
                    <form action="comment/{{$comment->id}}/delete" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach
            <form class="m-3" action="/comments" method="post">
                <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}" />
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" id="name" type="text">
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <input class="form-control" name="comment" id="comment" type="text">
                </div>
                <button class="btn btn-primary" type="submit">Create comment</button>
            </form>
        </div>
    </div>
</div>

{{-- @foreach ($post->comments as $comment)
<div class="comment">
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
<div>
@endforeach
 --}}





