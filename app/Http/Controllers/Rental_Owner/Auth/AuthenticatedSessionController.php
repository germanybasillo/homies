<?php

namespace App\Http\Controllers\Rental_Owner\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\Rental_OwnerLoginRequest;
use App\Models\Rental_Owner;
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
        return view('rental_owner.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Rental_OwnerLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('rental_owner.dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('rental_owner')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
