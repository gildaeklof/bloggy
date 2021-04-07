<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;

class EditPostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Post $post, Request $request)
    {
        $this->validate($request, [
            'description' => 'string',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif,svg|max:1000'
        ]);

        $post->title = $request->input('title');
        $post->description = $request->input('description');


        if ($post->image !== null) {
            unlink(public_path() .  '/' . $post->image);
        }

        if ($request->hasFile('image')) {
            $fileName = $request->file('image')->store('images');
            $post->image = $fileName;
        }

        $post->category = $request->input('category');
        $post->user_id = Auth::id();

        $post->save();

        return back()->withSuccess('Your post was updated!');
    }
}
