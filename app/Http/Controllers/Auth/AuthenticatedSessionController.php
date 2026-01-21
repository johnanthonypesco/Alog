<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Attempt to authenticate using email/password
        $request->authenticate();

        // 2. Regenerate session ID (Security best practice)
        $request->session()->regenerate();

        // 3. CHECK: Is the user active?
        // This prevents deactivated employees from logging in even with correct password.
        if (Auth::user()->is_active == false) {
            
            // Log them out immediately
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Return with error message
            return back()->withErrors([
                'email' => 'This account has been deactivated. Please contact the Owner.',
            ]);
        }

        // 4. Redirect to Dashboard (or intended page)
        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}