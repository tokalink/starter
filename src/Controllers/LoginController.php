<?php

namespace Tokalink\Starter\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // jika sudah login
        if (auth()->check()) {
            return redirect()->route('tokalink.dashboard');
        }

        return view('tokalink::auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['email-username', 'password']);

        // login by email or username
        if (filter_var($credentials['email-username'], FILTER_VALIDATE_EMAIL)) {
            $fieldType = 'email';
        } else {
            $fieldType = 'username';
        }

        // login
        Auth::attempt([$fieldType => $credentials['email-username'], 'password' => $credentials['password']]);
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('error', 'Email/Username atau Password salah');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('tokalink.login');
    }
}
