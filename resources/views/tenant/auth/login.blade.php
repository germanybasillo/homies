<x-guest-layout>
    <!-- Session Status -->

    <div class="form-group">
        <a href="{{ route('admin.login') }}" class="user-type-link">
            Admin
        </a>
        <a href="{{ route('tenant.login') }}" class="user-type-link btn1" style="background-color: green;color:white;border-color:green;">
            Tenant
        </a>
        <a href="{{ route('rental_owner.login') }}" class="user-type-link btn2">
            Rental Owner
        </a>
    </div>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center" style="color: green;">
        {{ __('Tenant Login') }}
    </h2>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('tenant.login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" style="color:white;" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" style="color:white;" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
             <!-- Remember Me -->
             <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ms-2 text-sm text-gray-600"  style="color:white;">{{ __('Remember me') }}</span>
                </label><br>
    
                @if (Route::has('password.request'))
                <a class="underline text-sm text-white-600 hover:text-blue-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="color:white;" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif
            </div>
    
            <div class="flex items-center justify-end mt-4"  style="color:white;">
                <a class="underline text-blue-600 hover:text-blue-900" href="{{ route('rental_owner.register') }}">
                    {{ __('Register here') }}
                </a>
                
    
                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
</x-guest-layout>
