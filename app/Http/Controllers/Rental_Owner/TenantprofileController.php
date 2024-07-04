<?php

namespace App\Http\Controllers\Rental_Owner;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Tenantprofile;


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
        $validator = Validator::make($request->all(), [
            'fname' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
            'lname' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
            'mname' => ['required', 'string', 'min:1', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
            'email' => 'required|email|unique:tenantprofiles,email|gmail',
            'contact' => ['required','string','unique:tenantprofiles,contact','regex:/^(\+63|0)9\d{9}$/',],
            'address' =>'required', 'string', 'min:10', 'max:50',
            'gender' => 'required|string',
            'profile' => 'mimes:png,jpeg,jpg|max:2048',          
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
    
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
        return redirect('/rental_owner/tenantprofiles')->with('success', "Tenantprofile Data Has Been inserted");
    }
    
    public function update(Request $request, $id) {

        $validator = Validator::make($request->all(), [
                'fname' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
                'lname' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
                'mname' => ['required', 'string', 'min:1', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
                'email' => ['required','email','unique:tenantprofiles,email,' . $id,function ($attribute, $value, $fail) {if (strpos($value, '@gmail.com') === false) { $fail('The '.$attribute.' must be a valid Gmail address.');}},],
                'contact' => ['required','string','regex:/^(\+63|0)9\d{9}$/','unique:tenantprofiles,contact,' . $id,],
                'address' => 'required|string',
                'gender' => 'required|string',
                'profile' => 'mimes:png,jpeg,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()
                            ->back()
                            ->withErrors($validator)
                            ->withInput();
            }
    
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
            ->with('success', 'Tenantprofile ' . $request['email'] . ' was updated successfully.');
    }
    
  public function destroy($id)
  {
    $tenantprofile = Tenantprofile::find($id);
    $tenantprofile->delete();
    return redirect("/rental_owner/tenantprofiles")
      ->with('success', 'Tenantprofile '.$id.'info deleted successfully');
  }
  
}
