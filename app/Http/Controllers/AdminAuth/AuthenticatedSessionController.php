<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function showLoginForm(Request $request)
    {
        return view('backend.auth.login');
    }


    // Admin Login
    public function login(Request $request)
    {
        //Validate Login Form Data
        $request->validate([
            'email' => 'required|email|',
            'password' => 'required'
        ]);

        //Try Logging in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            Session::flash('login_success', 'Successfully Logged in!');
            return redirect()->intended(route('dashboard'));
        } else {
            Session::flash('error', 'Invalid Email or Passowrd!');
            return back();
        }
    }

    //Admin Logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('dashboard.login');
    }
}
