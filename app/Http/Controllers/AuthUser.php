<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthUser extends Controller
{
    public function Page()
    {
        return view('page.login');
    }
    public function Login(LoginRequest $request)
    {
        $credentials = $request->validated();

        $remember = $request->has('remember');

        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']], $remember)) {
            $user = Auth::user();
            session(['auth' => [
                'email' => $user->email,
                'role' => $user->role,
            ]]);
            return match ($user->role) {
                'admin', 'cslayer1', 'cslayer2' => redirect()->route('admin'),
                'buyer' => redirect()->route('buyer'),
                default => redirect()->route('home'),
            };
        }
        return back()->withErrors([
            'email' => 'Email or password is incorrect.',
        ]);
    }

    public function Logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('page.login');
    }
}
