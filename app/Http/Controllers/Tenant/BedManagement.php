<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bed;
use App\Models\Selectbed;
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
        return view('tenant.bedmanagement.add',[
            'selectbeds' => Selectbed::all()
        ]);
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
            'selectbed_id' => 'required|exists:selectbeds,id|unique:beds,selectbed_id',
            'daily_rate' => 'required|string',
            'monthly_rate' => 'required|string',
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
            'selectbed_id' => 'required|exists:selectbeds,id|unique:beds,selectbed_id',
            'daily_rate' => 'required|string',
            'monthly_rate' => 'required|string',
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
