<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

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

        //dd($request->all());

        if ($request->hasFile('image')) {
            //$file = $request->file('image');
            $fileName = $request->file('image')->store('images');
            //$file->store('storage/uploads', 'public');
            //Storage::disk('local')->put($file, 'Contents');
            $post->image = $fileName;
        }


        $post->category = $request->input('category');
        $post->user_id = Auth::id();
        $post->save();



        return back()->withSuccess('Your post was created!');
    }
}
