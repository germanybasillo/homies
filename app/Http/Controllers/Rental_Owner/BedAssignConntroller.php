<?php

namespace App\Http\Controllers\Rental_Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bedassign;

class BedAssignConntroller extends Controller
{
    public function index(): View
    {
        return view('rental_owner.bedassign.view', [
            'bedassigns' => Bedassign::all()
        ]);
    }

    public function create(): View
    {
        return view('rental_owner.bedassign.add');
    }

    public function show(string $id): View
    {
        return view('rental_owner.bedassign.edit', [
            'bedassign' => Bedassign::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string',
                'bed_no' => 'required|string',
                'room_no' => 'required|string',
                'start_date' => 'required|string',
                'due_date' => 'required|string',
                
            ]
        );
        $bedassign= new Bedassign($request->all());
        $bedassign->save();
        return redirect('/rental_owner/bedassigns')->with('sucess',"Bed-Assigns Data Has Been inserted");
    }

    public function update(Request $request, $id) {
        $request->validate(
            [
                'name' => 'required|string',
                'bed_no' => 'required|string',
                'room_no' => 'required|string',
                'start_date' => 'required|string',
                'due_date' => 'required|string',
            ]);
    
        $bedassign = Bedassign::find($id);
        $bedassign->update($request->all());
    
        return redirect('/rental_owner/bedassigns')->with('sucess',"Bed-Assigns Data Has Been updated");
    }

    public function destroy($id)
    {
      $bedassign = Bedassign::find($id);
      $bedassign->delete();
      return redirect('/rental_owner/bedassigns')
        ->with('success', 'Bed-Assigns '.$id.'info deleted successfully');
    }
}
