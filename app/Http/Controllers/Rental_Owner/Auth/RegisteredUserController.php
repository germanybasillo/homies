<?php

namespace App\Http\Controllers\Rental_Owner\Auth;

use App\Http\Controllers\Controller;
use App\Models\Rental_Owner;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('rental_owner.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Rental_Owner::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            
        ]);

        $rental_owner = Rental_Owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($rental_owner));

        Auth::guard('rental_owner')->login($rental_owner);

        return redirect(route('rental_owner.dashboard', absolute: false));
    }
}
