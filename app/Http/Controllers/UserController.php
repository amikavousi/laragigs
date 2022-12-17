<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(UserRequest $request)
    {
        $request['password'] = bcrypt($request['password']);
        $user = User::create($request->all());
        auth()->login($user);
        return redirect('/')->with('message', 'user created');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->back()->with("message", "Logouted");
    }

    public function loginForm()
    {
        return view("users.login");
    }

    public function login(Request $request)
    {
        $validate = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);
        if (auth()->attempt($validate)) {
            $request->session()->regenerate();
            $userName = auth()->user()->name;
            return redirect('/')->with('message', "welcome $userName ");
        } else {
            return back()->withErrors(['email' => "false information"])->onlyInput('email');
        }
    }

}
