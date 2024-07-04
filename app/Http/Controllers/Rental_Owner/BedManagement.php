<?php

namespace App\Http\Controllers\Rental_Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bed;

class BedManagement extends Controller
{
    public function index(): View
    {
        return view('rental_owner.bedmanagement.view', [
            'beds' => Bed::all()
        ]);
    }

    public function create(): View
    {
        return view('rental_owner.bedmanagement.add');
    }

    public function show(string $id): View
    {
        return view('rental_owner.bedmanagement.edit', [
            'bed' => Bed::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'room_no' => 'required|string',
                'bed_no' => 'required|string',
                'daily_rate' => 'required|string',
                'monthly_rate' => 'required|string',
                'bed_status' => 'required|in:available,occupied',
            ]
        );
        $bed= new Bed($request->all());
        $bed->save();
        return redirect('/rental_owner/beds')->with('sucess',"Bed-Management Data Has Been inserted");
    }

    public function update(Request $request, $id) {
        $request->validate(
            [
                'room_no' => 'required|string',
                'bed_no' => 'required|string',
                'daily_rate' => 'required|string',
                'monthly_rate' => 'required|string',
                'bed_status' => 'required|in:available,occupied',
            ]);
    
        $bed = Bed::find($id);
        $bed->update($request->all());
    
        return redirect('/rental_owner/beds')->with('sucess',"Bed-Management Data Has Been updated");
    }

    public function destroy($id)
    {
      $bed = Bed::find($id);
      $bed->delete();
      return redirect('/rental_owner/beds')
        ->with('success', 'Bed '.$id.'info deleted successfully');
    }
}
