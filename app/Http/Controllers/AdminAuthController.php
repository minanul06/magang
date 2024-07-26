<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use App\Models\Admin;
use App\Models\UserSekolah;

class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('dashboardadmin.loginadmin');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $admin = Admin::where('email', $credentials['email'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::login($admin);
            $request->session()->regenerate();
            return redirect()->intended('dashboardadmin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard()
    {
        return view('dashboardadmin.dashboard');
    }

    public function viewAllUserSekolah()
    {
        $users = UserSekolah::all();
        return view('dashboardadmin.viewallusersekolah', ['users' => $users]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/loginadmin');
    }
}
