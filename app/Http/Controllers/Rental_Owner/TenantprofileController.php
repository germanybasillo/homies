<?php

namespace App\Http\Controllers\Rental_Owner;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Tenantprofile;
use Illuminate\Support\Facades\Storage;

class TenantprofileController extends Controller
{
    public function index(): View
    {
        return view('rental_owner.tenantprofile.view', [
            'tenantprofiles' => Tenantprofile::all()
        ]);
    }

    public function create(): View
    {
        return view('rental_owner.tenantprofile.add');
    }

    public function show(string $id): View
    {
        return view('rental_owner.tenantprofile.edit', [
            'tenantprofile' => Tenantprofile::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'mname' => 'required|string',
            'email' => 'required|email|unique:tenantprofiles,email',
            'contact' => 'required|string|unique:tenantprofiles,contact',
            'address' => 'required|string',
            'gender' => 'required|string',
            'profile' => 'mimes:png,jpeg,jpg|max:2048',
        ], [
            'email.unique' => 'The email has already been taken.',
            'contact.unique' => 'The number has already been taken.'
        ]);
        
    
        $tenantprofile = new Tenantprofile($request->all());

         // Handle the file upload
    if ($request->hasFile('profile')) {
        $file = $request->file('profile');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $path = $file->storeAs('profiles', $filename, 'public');
        
        // Save the file path in the database
        $tenantprofile->profile = 'storage/' . $path;
    }

        $tenantprofile->fname = $request->input('fname'); 
        
        $tenantprofile->save();
        return redirect('/rental_owner/tenantprofiles')->with('status', "Tenantprofile Data Has Been inserted");
    }
    
    public function update(Request $request, $id) {
        $request->validate(
            [
                'fname' => 'required|string',
                'lname' => 'required|string',
                'mname' => 'required|string',
                'email' => 'required|email|unique:tenantprofiles,email,' . $id,
                'contact' => 'required|string|unique:tenantprofiles,contact,' . $id,
                'address' => 'required|string',
                'gender' => 'required|string',
                'profile' => 'mimes:png,jpeg,jpg|max:2048',
            ],
            [
                'email.unique' => 'The email has already been taken.',
                'contact.unique' => 'The contact number has already been taken.'
            ]);
    
        $tenantprofile = Tenantprofile::find($id);
        $tenantprofile->update($request->all());
        
        $tenantprofile->update($request->except('profile'));
        // Handle profile image upload
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('public/profiles', $filename); // Store file in storage/app/public/profiles
    
            // Save the file path in the database
            $tenantprofile->profile = 'profiles/' . $filename;
            $tenantprofile->save(); // Save the updated profile with the new image path
        }
    
        return redirect("/rental_owner/tenantprofiles")
            ->with('status', 'Tenantprofile ' . $request['email'] . ' was updated successfully.');
    }
    
  public function destroy($id)
  {
    $tenantprofile = Tenantprofile::find($id);
    $tenantprofile->delete();
    return redirect("/rental_owner/tenantprofiles")
      ->with('success', 'Tenantprofile '.$id.'info deleted successfully');
  }
  
}
