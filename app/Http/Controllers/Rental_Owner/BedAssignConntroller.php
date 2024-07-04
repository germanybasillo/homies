<?php

namespace App\Http\Controllers\Rental_Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BedAssignConntroller extends Controller
{
    public function index(): View
    {
        return view('rental_owner.bedassign.view');
    }
}
