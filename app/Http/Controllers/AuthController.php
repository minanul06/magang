<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use App\Models\UserSekolah;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('dashboardsekolah.loginsekolah');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = UserSekolah::where('email', $credentials['email'])->first();

        //if ($user && $user->password === $credentials['password']) {
        //    Auth::login($user);
        //    $request->session()->regenerate();
        //    return redirect()->intended('dashboardsekolah');
        //}

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended('dashboardsekolah');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function dashboard()
    {
        return view('dashboardsekolah.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/loginsekolah');
    }
}
