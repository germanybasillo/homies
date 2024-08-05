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
        'room_no' => 'required|string|unique:rooms,room_no',
        'description' => 'required|string',
        'profile' => 'mimes:png,jpeg,jpg|max:2048',

        ]);

    $selected = new Selected($request->all());

    if ($request->hasFile('profile')) {
        $file = $request->file('profile');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('profiles', $filename, 'public');
        
        // Save the file path in the database
        $selected->profile = 'storage/' . $path;
    }
    $selected->save();
    return redirect('/rental_owner/selecteds')->with('sucess', "RoomSelected Has Been inserted");
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'room_no' => 'required|string|unique:rooms,room_no,'.$id,
        'description' => 'required|string',
        'profile' => 'mimes:png,jpeg,jpg|max:2048',

        ]);

        $selected = Selected::find($id);
        $selected->update($request->all());

        $selected->update($request->except('profile'));
        // Handle profile image upload
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profiles', $filename); // Store file in storage/app/public/profiles
    
            // Save the file path in the database
            $selected->profile = 'profiles/' . $filename;
            $selected->save(); // Save the updated profile with the new image path
        }
        return redirect('/rental_owner/selecteds')->with('sucess', "RoomSelected Has Been inserted");
    }

    public function destroy($id)
    {
      $selected = Selected::find($id);
      $selected->delete();
      return redirect('/rental_owner/selecteds')
        ->with('success', 'RoomSelected '.$id.'info deleted successfully');
    }
}
