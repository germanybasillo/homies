<?php

namespace App\Http\Controllers\Rental_Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Room;

class RoomManagement extends Controller
{
    public function index(): View
    {
        return view('rental_owner.roommanagement.view', [
            'rooms' => Room::all()
        ]);
    }

    public function create(): View
    {
        return view('rental_owner.roommanagement.add');
    }

    public function show(string $id): View
    {
        return view('rental_owner.roommanagement.edit', [
            'room' => Room::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
    $request->validate([
        'room_no' => 'required|string|unique:rooms,room_no',
        'description' => 'required|string',
        'profile' => 'mimes:png,jpeg,jpg|max:2048',

        ]);

    $room = new Room($request->all());

    if ($request->hasFile('profile')) {
        $file = $request->file('profile');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('profiles', $filename, 'public');
        
        // Save the file path in the database
        $room->profile = 'storage/' . $path;
    }
    $room->save();
    return redirect('/rental_owner/rooms')->with('sucess', "Room Has Been inserted");
    }

    public function update(Request $request, $id)
    {
    $request->validate([
        'room_no' => 'required|string|unique:rooms,room_no,'.$id,
        'description' => 'required|string',
        'profile' => 'mimes:png,jpeg,jpg|max:2048',

        ]);

        $room = Room::find($id);
        $room->update($request->all());

        $room->update($request->except('profile'));
        // Handle profile image upload
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profiles', $filename); // Store file in storage/app/public/profiles
    
            // Save the file path in the database
            $room->profile = 'profiles/' . $filename;
            $room->save(); // Save the updated profile with the new image path
        }
        return redirect('/rental_owner/rooms')->with('sucess', "Room Has Been inserted");
    }

    public function destroy($id)
    {
      $room = Room::find($id);
      $room->delete();
      return redirect('/rental_owner/rooms')
        ->with('success', 'Room '.$id.'info deleted successfully');
    }
}
