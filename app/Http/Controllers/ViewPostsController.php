<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class ViewPostsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $posts = Post::all();
        return view('/index', [
            'posts' => $posts
        ]);
        /*$posts = DB::select('select * from posts');
        return view('index', [
            'posts' => $posts
        ]);*/
    }
}
