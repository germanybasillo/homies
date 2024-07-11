<?php

namespace App\Http\Controllers\Rental_Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Contentpage extends Controller
{
    public function invoice(): View
    {
        return view('rental_owner.contentpage.invoice');
    }

    public function profile(): View
    {
        return view('rental_owner.contentpage.profile');
    }
    public function payment(): View
    {
        return view('rental_owner.contentpage.payment');
    }

    public function paymenthistory(): View
    {
        return view('rental_owner.contentpage.paymenthistory');
    }

    public function sms(): View
    {
        return view('rental_owner.contentpage.sms');
    }

    public function notice(): View
    {
        return view('rental_owner.contentpage.notice');
    }

    public function suggestion(): View
    {
        return view('rental_owner.contentpage.suggestion');
    }

    public function income(): View
    {
        return view('rental_owner.contentpage.income');
    }

    public function collectibles(): View
    {
        return view('rental_owner.contentpage.collectibles');
    }
}
