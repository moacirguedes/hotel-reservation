<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->user()->isManager)
                return view('home');

            return $next($request);
        });
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'isManager' => $request['ismanager'] == "1" ? true : false
        ]);

        return redirect('home');
    }

    public function edit(User $user)
    {
        return view('users.update', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $user = User::find($user->id);
        $user->isManager = $request->ismanager ? true : false;
        $user->save();
        return redirect('home');
    }

    public function destroy(User $user)
    {
        $user->destroy($user->id);
        return redirect('home');
    }
}
