<?php
namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class RoomManagement extends Controller
{
    public function index(): View
    {
        // Fetch rooms only for the currently authenticated user
        return view('tenant.roommanagement.view', [
            'rooms' => Room::where('tenant_id', Auth::id())->get()
        ]);
    }

    public function create(): View
    {
        return view('tenant.roommanagement.add');
    }

    public function show(string $id): View
    {
        // Fetch the room only if it belongs to the authenticated user
        $room = Room::where('id', $id)
                    ->where('tenant_id', Auth::id())
                    ->firstOrFail();

                    return view('tenant.roommanagement.edit', ['room' => $room]);
                }
            
                public function store(Request $request)
                {
                    $request->validate([
                        // 'room_no' => 'required|string|unique:rooms,room_no',
                        // 'description' => 'required|string',
                        'selected_id' => 'required|exists:selecteds,id|unique:rooms,selected_id',
                        'start_date' => 'required|string',
                        'due_date' => 'required|string',
                        // 'profile' => 'mimes:png,jpeg,jpg|max:2048',
                    ]);
            
                    $room = new Room($request->all());
            
                    // Assign the room to the currently authenticated user
                    $room->tenant_id = Auth::id();
            
                    // Handle profile image upload
                    if ($request->hasFile('profile')) {
                        $file = $request->file('profile');
                        $filename = time() . '.' . $file->getClientOriginalExtension();
                        $path = $file->storeAs('profiles', $filename, 'public');
                        $room->profile = 'storage/' . $path;
                    }
            
                    $room->save();
            
                    return redirect('/tenant/tenantprofiles')->with('success', "Room has been inserted");
                }
            
                public function update(Request $request, $id)
                {
                    $request->validate([
                        // 'room_no' => 'required|string|unique:rooms,room_no,' . $id,
                        // 'description' => 'required|string',
                        'selected_id' => 'required|exists:selecteds,id|unique:rooms,selected_id',
                        'start_date' => 'required|string',
                        'due_date' => 'required|string',
                        // 'profile' => 'mimes:png,jpeg,jpg|max:2048',
                    ]);
            
                    $room = Room::where('id', $id)
                                ->where('tenant_id', Auth::id())
                                ->firstOrFail();
            
                    $room->update($request->all());
            
                    // Handle profile image upload
                    if ($request->hasFile('profile')) {
                        $file = $request->file('profile');
                        $filename = time() . '.' . $file->getClientOriginalExtension();
                        $path = $file->storeAs('public/profiles', $filename);
                        $room->profile = 'profiles/' . $filename;
                    }
            
                    $room->save();
            
                    return redirect('/tenant/rooms')->with('success', "Room has been updated successfully");
                }
            
                public function destroy($id)
                {
                    $room = Room::where('id', $id)
                                ->where('tenant_id', Auth::id())
                                ->firstOrFail();
            
                    $room->delete();
            
                    return redirect('/tenant/rooms')->with('success', 'Room has been deleted successfully');
                }
            }
            