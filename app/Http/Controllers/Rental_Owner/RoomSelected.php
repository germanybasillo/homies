<?php

namespace App\Http\Controllers\Rental_Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Selected;

class RoomSelected extends Controller
{
    public function index(): View
    {
        return view('rental_owner.roompicture.view', [
            'selecteds' => Selected::all()
        ]);
    }

    public function create(): View
    {
        return view('rental_owner.roompicture.add');
    }

    public function show(string $id): View
    {
        return view('rental_owner.roompicture.edit', [
            'selected' => Selected::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_no' => 'required|string|unique:selecteds,room_no',
            'description' => 'required|string',
            'profile1' => 'mimes:png,jpeg,jpg|max:2048',
            'profile2' => 'mimes:png,jpeg,jpg|max:2048',
            'profile3' => 'mimes:png,jpeg,jpg|max:2048',
            'profile4' => 'mimes:png,jpeg,jpg|max:2048',
            'profile5' => 'mimes:png,jpeg,jpg|max:2048',
            'profile6' => 'mimes:png,jpeg,jpg|max:2048',
            'caption1' => 'nullable|string',
            'caption2' => 'nullable|string',
            'caption3' => 'nullable|string',
            'caption4' => 'nullable|string',
            'caption5' => 'nullable|string',
            'caption6' => 'nullable|string',

        ]);
    
        $selected = new Selected();
        $selected->room_no = $request->input('room_no');
        $selected->description = $request->input('description');
    
        // Handle each profile image individually
        for ($i = 1; $i <= 6; $i++) {
            $profileField = 'profile' . $i;
            $captionField = 'caption' . $i;
            if ($request->hasFile($profileField)) {
                $file = $request->file($profileField);
                $filename = time() . "_$profileField." . $file->getClientOriginalExtension();
                $path = $file->storeAs('profiles', $filename, 'public');
                
                // Save the file path in the corresponding field
                $selected->$profileField = 'storage/' . $path;
            }

            $selected->$captionField = $request->input($captionField);
        }
    
        $selected->save();
    
        return redirect('/rental_owner/selecteds')->with('success', "RoomSelected Has Been inserted");
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'room_no' => 'required|string|unique:selecteds,room_no,'.$id,
            'description' => 'required|string',
            'profile1' => 'mimes:png,jpeg,jpg|max:2048',
            'profile2' => 'mimes:png,jpeg,jpg|max:2048',
            'profile3' => 'mimes:png,jpeg,jpg|max:2048',
            'profile4' => 'mimes:png,jpeg,jpg|max:2048',
            'profile5' => 'mimes:png,jpeg,jpg|max:2048',
            'profile6' => 'mimes:png,jpeg,jpg|max:2048',
        ]);
    
        $selected = Selected::findOrFail($id);
        $selected->room_no = $request->input('room_no');
        $selected->description = $request->input('description');
    
        // Handle each profile image individually
        for ($i = 1; $i <= 6; $i++) {
            $profileField = 'profile' . $i;
            if ($request->hasFile($profileField)) {
                $file = $request->file($profileField);
                $filename = time() . "_$profileField." . $file->getClientOriginalExtension();
                $path = $file->storeAs('profiles', $filename, 'public');
                
                // Save the file path in the corresponding field
                $selected->$profileField = 'storage/' . $path;
            }
        }
    
        $selected->save();
    
        return redirect('/rental_owner/selecteds')->with('success', "RoomSelected Has Been updated");
    }
    
    public function destroy($id)
    {
      $selected = Selected::find($id);
      $selected->delete();
      return redirect('/rental_owner/selecteds')
        ->with('success', 'RoomSelected '.$id.'info deleted successfully');
    }
}
