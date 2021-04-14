<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function createPost(Post $post, Request $request)
    {
        $this->validate($request, [
            'description' => 'string',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:1000'
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');

        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->store('images');
            $post->image = $fileName;
        }

        $post->category = $request->input('category');
        $post->user_id = Auth::id();
        $post->save();

        return back()->withSuccess('Your post was created!');
    }

    public function editPost(Post $post, Request $request)
    {
        $this->validate($request, [
            'description' => 'string',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:1000'
        ]);

        $post->title = $request->input('title');
        $post->description = $request->input('description');


        if ($request->hasFile('image')) {
            if ($post->image !== null) {
                unlink(public_path() . '/' . $post->image);
            }

            $fileName = $request->file('image')->store('images');
            $post->image = $fileName;
        }

        $post->category = $request->input('category');
        $post->update();

        return back()->withSuccess('Your post was updated!');
    }

    public function deletePost(Post $post)
    {
        if ($post->image !== null) {
            unlink(public_path() . '/' . $post->image);
        }

        $post->delete();
        $post->comments()->delete();

        return back()->withSuccess('Your post is deleted!');
    }
}
