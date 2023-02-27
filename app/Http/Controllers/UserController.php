<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

    public function register()
    {
        $data = User::all();
        $dataCompany = Company::all();

        return view('admin.register', ['user' => $data, 'company' => $dataCompany]);
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'company' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
            'role' => 'required',
            'account_status' => 'required'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect('/register')->with('success', 'You created successfully');
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'last_name' => 'required',
            'first_name' => 'required',
            'company' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
            'role' => 'required',
            'account_status' => 'required'
        ]);

        $user->update($validated);

        return redirect('/register')->with('updated', 'You created successfully');
    }
}
