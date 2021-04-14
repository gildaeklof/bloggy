
<div class="container  mt-4">
    <div class="row d-flex justify-content-center">
        <div class="col">
            <div class="border-bottom mb-5"></div>
            <h3 class="h5">Comments ({{$post->comments->count()}})</h3>
            @foreach ($post->comments as $comment)
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center pb-1">
                    <div class="user d-flex flex-row align-items-center"><span><small class="font-weight-bolder text-primary pr-2 text-capitalize">{{$comment->name}}</small></span> </div> <small>{{$comment->created_at}}</small>
                </div>
                <p class="">{{$comment->comment}}</p>
                <div class="action d-flex justify-content-start mt-1 align-items-center">
                    @if (Auth::check())
                    <form action="comment/{{$comment->id}}/delete" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>
                    @endif
                </div>
            </div>
            @endforeach

            <form class="m-3 pt-4" action="/comments" method="post">
                <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}" />
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" name="name" id="name" placeholder="Enter your name" type="text">
                </div>
                <div class="form-group">
                    <label for="comment">Comment</label>
                    <textarea class="form-control" name="comment" id="comment" placeholder="Enter a comment" type="text"></textarea>
                </div>
                <button class="btn btn-dark" type="submit">Create comment</button>
            </form>
        </div>
    </div>
</div>






