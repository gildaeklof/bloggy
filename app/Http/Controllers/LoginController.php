<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        $this->validate($request, [
            'email'           => 'required|max:255|email',
            'password'           => 'required',
        ]);

        Session::flash('email', $request->input('email'));

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }
        return back()->withErrors('Whoops! Please try again!');
    }
}
