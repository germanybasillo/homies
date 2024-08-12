<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;
use App\Models\TenantProfile;
use App\Models\Room;
use App\Models\Bed;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // Register any bindings or services here
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Custom validation rule for Gmail
        Validator::extend('gmail', function ($attribute, $value, $parameters, $validator) {
            return strpos($value, '@gmail.com') !== false;
        });

        Validator::replacer('gmail', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':attribute', $attribute, 'The :attribute must be a valid Gmail address.');
        });

        // Share tenant profiles, rooms, and beds data with all views
        View::composer('*', function ($view) {
            $tenantprofiles = TenantProfile::count();
            $rooms = Room::count();
            $beds = Bed::count();

            $view->with(compact('tenantprofiles', 'rooms', 'beds'));
        });
    }
}
