<?php

namespace App\Http\Controllers\Rental_Owner;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
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
        $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'mname' => 'required|string',
            'email' => 'required|email|unique:tenantprofiles,email',
            'contact' => 'required|string|unique:tenantprofiles,contact',
            'address' => 'required|string',
            'gender' => 'required|string',
            'profile' => 'required'
        ], [
            'email.unique' => 'The email has already been taken.',
            'contact.unique' => 'The number has already been taken.'
        ]);
    
        $tenantprofile = new Tenantprofile($request->all());
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
                'profile' => 'required'
            ],
            [
                'email.unique' => 'The email has already been taken.',
                'contact.unique' => 'The contact number has already been taken.'
            ]);
    
        $tenantprofile = Tenantprofile::find($id);
        $tenantprofile->update($request->all());
    
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
