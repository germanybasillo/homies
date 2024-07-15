<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bed;

class BedManagement extends Controller
{
    public function index(): View
    {
        return view('tenant.bedmanagement.view', [
            'beds' => Bed::all()
        ]);
    }

    public function create(): View
    {
        return view('tenant.bedmanagement.add');
    }

    public function show(string $id): View
    {
        return view('tenant.bedmanagement.edit', [
            'bed' => Bed::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'bed_no' => 'required|string',
                'daily_rate' => 'required|string',
                'monthly_rate' => 'required|string',
                'bed_status' => 'required|in:available,occupied',
            ]
        );
        $bed= new Bed($request->all());
        $bed->save();
        return redirect('/tenant/beds')->with('sucess',"Bed-Management Data Has Been inserted");
    }

    public function update(Request $request, $id) {
        $request->validate(
            [
                'bed_no' => 'required|string',
                'daily_rate' => 'required|string',
                'monthly_rate' => 'required|string',
                'bed_status' => 'required|in:available,occupied',
            ]);
    
        $bed = Bed::find($id);
        $bed->update($request->all());
    
        return redirect('/tenant/beds')->with('sucess',"Bed-Management Data Has Been updated");
    }

    public function destroy($id)
    {
      $bed = Bed::find($id);
      $bed->delete();
      return redirect('/tenant/beds')
        ->with('success', 'Bed '.$id.'info deleted successfully');
    }
}
