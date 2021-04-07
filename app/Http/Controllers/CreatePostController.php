<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;

class CreatePostController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //valideringsregler för inputfältet
        //man måste skriva minst 10 karaktärer och det skall vara en sträng
        //laravel skapar automatiskt nya felmeddelanden
        $this->validate($request, [
            'description' => 'required|string|min:10',
            'image' => 'nullable'
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->image = $request->input('image');
        $post->category = $request->input('category');
        $post->user_id = Auth::id();
        $post->save();

        return back()->withSuccess('Your post was created!');
    }
}
