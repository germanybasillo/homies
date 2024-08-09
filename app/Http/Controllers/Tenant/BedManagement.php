<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bed;
use Illuminate\Support\Facades\Auth;

class BedManagement extends Controller
{
    public function index(): View
    {
        // Fetch beds only for the currently authenticated user
        return view('tenant.bedmanagement.view', [
            'beds' => Bed::where('tenant_id', Auth::id())->get()
        ]);
    }

    public function create(): View
    {
        return view('tenant.bedmanagement.add');
    }

    public function show(string $id): View
    {
        // Fetch the bed only if it belongs to the authenticated user
        $bed = Bed::where('id', $id)
                    ->where('tenant_id', Auth::id())
                    ->firstOrFail();

        return view('tenant.bedmanagement.edit', ['bed' => $bed]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bed_no' => 'required|string',
            'daily_rate' => 'required|string',
            'monthly_rate' => 'required|string',
            'bed_status' => 'required|in:available,occupied',
        ]);

        $bed = new Bed($request->all());

        // Assign the bed to the currently authenticated user
        $bed->tenant_id = Auth::id();
        $bed->save();

        return redirect('/tenant/tenantprofiles')->with('success', "Bed-Management Data Has Been inserted");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bed_no' => 'required|string',
            'daily_rate' => 'required|string',
            'monthly_rate' => 'required|string',
            'bed_status' => 'required|in:available,occupied',
        ]);

        $bed = Bed::where('id', $id)
                    ->where('tenant_id', Auth::id())
                    ->firstOrFail();

        $bed->update($request->all());

        return redirect('/tenant/beds')->with('success', "Bed-Management Data Has Been updated");
    }

    public function destroy($id)
    {
        $bed = Bed::where('id', $id)
                    ->where('tenant_id', Auth::id())
                    ->firstOrFail();

        $bed->delete();

        return redirect('/tenant/beds')->with('success', 'Bed ' . $id . ' info deleted successfully');
    }
}
