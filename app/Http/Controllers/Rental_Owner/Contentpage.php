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
}
