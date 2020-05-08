<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Register a user.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password'=>'required'
        ]);
        return User::where('email', $request->input('email'))->where('password', $request->input('password'))->first();
    }
}
