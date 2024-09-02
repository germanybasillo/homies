<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendsuggestionController extends Controller
{
    public function show()
    {
        return view('auth.contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|{{ auth()->user()->email }}',
            'suggest' => 'required|string|max:5',
            'date' => 'required|string|max:250',
        ]);

        // Send email using Laravel's built-in Mail facade
        Mail::to('support@zehagithub.com')->send(new \App\Mail\Suggestion($request->all()));

        return redirect('/tenant/suggestions')->with('success', 'Message sent successfully!');
    }
}
