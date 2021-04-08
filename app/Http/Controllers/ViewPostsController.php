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
    public function getAllPosts(Request $request)
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
    public function getFoodPosts(Request $request)
    {
        $posts = Post::where('category', 'food')->get();
        return view('/index', [
            'posts' => $posts
        ]);
    }
    public function getInteriorPosts(Request $request)
    {
        $posts = Post::where('category', 'interior')->get();
        return view('/index', [
            'posts' => $posts
        ]);
    }
    public function getFashionPosts(Request $request)
    {
        $posts = Post::where('category', 'fashion')->get();
        return view('/index', [
            'posts' => $posts
        ]);
    }
    public function getLifestylePosts(Request $request)
    {
        $posts = Post::where('category', 'lifestyle')->get();
        return view('/index', [
            'posts' => $posts
        ]);
    }
}
