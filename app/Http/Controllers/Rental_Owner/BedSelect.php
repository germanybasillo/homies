<?php

namespace App\Http\Controllers\Rental_Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Selectbed;
use Illuminate\View\View;

class BedSelect extends Controller
{
    public function index(): View
    {
        return view('rental_owner.bedselected.view', [
            'selectbeds' => Selectbed::all()
        ]);
    }

    public function create(): View
    {
        return view('rental_owner.bedselected.add');
    }

    public function show(string $id): View
    {
        return view('rental_owner.bedselected.edit', [
        'selectbed' => Selectbed::findOrFail($id)
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
        $selectbed= new Selectbed ($request->all());
        $selectbed->save();
        return redirect('/rental_owner/selectbeds')->with('sucess',"Bill Data Has Been inserted");
    }

    public function update(Request $request, $id) {
        $request->validate(
            [
                'bed_no' => 'required|string',
                'daily_rate' => 'required|string',
                'monthly_rate' => 'required|string',
                'bed_status' => 'required|in:available,occupied',
            ]);
    
        $selectbed = Selectbed::find($id);
        $selectbed->update($request->all());
    
        return redirect('/rental_owner/selectbeds')->with('sucess',"Bill Data Has Been updated");
    }

    public function destroy($id)
    {
      $selectbed = Selectbed::find($id);
      $selectbed->delete();
      return redirect('/rental_owner/selectbeds')
        ->with('success', 'Selectbeds '.$id.'info deleted successfully');
    }
}
