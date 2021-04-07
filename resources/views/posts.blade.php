@foreach ($posts->sortDesc() as $post)
{{$post->title}}
{{$post->description}}
<br>
@endforeach
