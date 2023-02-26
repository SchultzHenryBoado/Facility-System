<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function schedule()
    {
        return view('user.schedule');
    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt($validated)) {

            if (auth()->user()->role === 'admin') {
                $request->session()->regenerateToken();

                return redirect()->route('admin_dashboard');
            } else if (auth()->user()->role === 'user') {
                $request->session()->regenerateToken();

                return redirect('/schedule');
            }
        } else {
            return back()->with('error', 'The user does not match in our records');
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/login');
    }
}
