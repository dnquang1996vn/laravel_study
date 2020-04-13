<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index')->with([
            'users' => User::all()
        ]);
    }

    public function show()
    {

        return view('user.index')->with([
            'users' => User::where('id', auth()->id())->get()
        ]);
    }
}
