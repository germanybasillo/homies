<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Tenantpage extends Controller
{
    public function tenant(): View
    {
        return view('tenant.tenantpage.tenant');
    }

    public function notice(): View
    {
        return view('tenant.tenantpage.notice');
    }

    public function proof(): View
    {
        return view('tenant.tenantpage.proof');
    }

    public function history(): View
    {
        return view('tenant.tenantpage.history');
    }

    public function suggestion(): View
    {
        return view('tenant.tenantpage.suggestion');
    }
}
