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

        if (auth()->attempt([$fieldType => $credentials['email-username'], 'password' => $credentials['password']])) {
            // save session
            // $request->session()->regenerate();
            // redirect to dashboard
            return redirect(config('tokalink.admin_prefix'));

        }
        // gagal login
       echo 'gagal login';
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('tokalink.login');
    }
}
