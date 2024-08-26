<?php

namespace App\Http\Controllers\Rental_Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Bedassign;
use App\Models\Room;
use App\Models\Bed;
use App\Models\Selected;
use App\Models\Selectbed;
use App\Models\Tenantprofile; // Import the Tenantprofile model


class BedAssignConntroller extends Controller
{
    public function index(): View
    {
        return view('rental_owner.bedassign.view', [
            'bedassigns' => Bedassign::all(),
            'rooms' => Room::all(),
            'beds' => Bed::all(),
            'selecteds' => Selected::all(),
            'selectbeds' => Selectbed::all(),  
        ]);
    }

    public function create(): View
    {
        return view('rental_owner.bedassign.add', [
            'tenantprofiles' => Tenantprofile::all(),// Pass the tenant profiles to the view
        ]);
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
                'tenantprofile_id' => 'required|exists:tenantprofiles,id|unique:bedassigns,tenantprofile_id',
                'room_id' => 'nullable|exists:rooms,id|unique:bedassigns,room_id',
                'bed_id'  => 'nullable|exists:beds,id|unique:bedassigns,bed_id', 
                'selected_id'  => 'nullable|exists:beds,id|unique:bedassigns,bed_id',
                'selectbed_id'  => 'nullable|exists:beds,id|unique:bedassigns,bed_id',  
            ]
        );
        $bedassign= new Bedassign($request->all());
        $bedassign->save();
        return redirect('/rental_owner/bedassigns')->with('sucess',"Bed-Assigns Data Has Been inserted");
    }

    public function update(Request $request, $id) {
        $request->validate(
            [
                'tenantprofile_id' => 'required|exists:tenantprofiles,id|unique:bedassigns,tenantprofile_id',
                'room_id' => 'nullable|exists:rooms,id|unique:bedassigns,room_id',
                'bed_id'  => 'nullable|exists:beds,id|unique:bedassigns,bed_id',
                'selected_id'  => 'nullable|exists:beds,id|unique:bedassigns,bed_id',
                'selectbed_id'  => 'nullable|exists:beds,id|unique:bedassigns,bed_id', 
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
