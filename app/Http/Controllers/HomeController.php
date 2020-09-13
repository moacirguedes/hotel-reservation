<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'user' => auth()->user(),
            'users' => User::get(),
            'hotels' => Hotel::get()
        ]);
    }
}
