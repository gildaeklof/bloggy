<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DeletePostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Post $post)
    {

        unlink(public_path() .  '/' . $post->image);
        $post->delete();
        return back()->withSuccess('Your post is deleted!');
    }
}
