<?php
namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Tenantprofile;
use App\Models\Room;
use App\Models\Bed;
use Illuminate\Support\Facades\Auth;

class TenantprofileController extends Controller
{
    public function index(): View
    {
        // Show only the tenant profiles associated with the authenticated user
        return view('tenant.tenantprofile.view', [
            'tenantprofiles' => Tenantprofile::where('tenant_id', Auth::id())->get(),
            'rooms' => Room::where('tenant_id', Auth::id())->get(),
            'beds' => Bed::where('tenant_id', Auth::id())->get()
        ]);
    }

    public function create(): View
    {
        return view('tenant.tenantprofile.add');
    }

    public function show(string $id): View
    {
        $tenantprofile = Tenantprofile::where('id', $id)->where('tenant_id', Auth::id())->firstOrFail();
        return view('tenant.tenantprofile.edit', ['tenantprofile' => $tenantprofile]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fname' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
            'lname' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
            'mname' => ['required', 'string', 'min:1', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
            'email' => 'required|email|unique:tenantprofiles,email|gmail',
            'contact' => ['required', 'string', 'unique:tenantprofiles,contact', 'regex:/^(\+63|0)9\d{9}$/'],
            'address' => 'required|string|min:10|max:50',
            'gender' => 'required|string',
            'profile' => 'mimes:png,jpeg,jpg|max:2048',          
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $tenantprofile = new Tenantprofile($request->all());
        $tenantprofile->tenant_id = Auth::id(); // Associate the profile with the authenticated user

        // Handle the file upload
        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profiles', $filename, 'public');
            $tenantprofile->profile = 'storage/' . $path;
        }

        $tenantprofile->save();
        return redirect('/tenant/tenantprofiles')->with('success', "Tenantprofile Data Has Been inserted");
    }
    
    public function update(Request $request, $id)
    {
        $tenantprofile = Tenantprofile::where('id', $id)->where('tenant_id', Auth::id())->firstOrFail();

        $validator = Validator::make($request->all(), [
            'fname' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
            'lname' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
            'mname' => ['required', 'string', 'min:1', 'max:50', 'regex:/^[\pL\s\-]+$/u'],
            'email' => ['required', 'email', 'unique:tenantprofiles,email,' . $id, function ($attribute, $value, $fail) {
                if (strpos($value, '@gmail.com') === false) {
                    $fail('The '.$attribute.' must be a valid Gmail address.');
                }
            }],
            'contact' => ['required', 'string', 'regex:/^(\+63|0)9\d{9}$/', 'unique:tenantprofiles,contact,' . $id],
            'address' => 'required|string|min:10|max:50',
            'gender' => 'required|string',
            'profile' => 'mimes:png,jpeg,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $tenantprofile->update($request->all());

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profiles', $filename, 'public');
            $tenantprofile->profile = 'storage/' . $path;
        }

        $tenantprofile->save();

        return redirect("/tenant/tenantprofiles")->with('success', 'Tenantprofile ' . $request['email'] . ' was updated successfully.');
    }
    
    public function destroy($id)
    {
        $tenantprofile = Tenantprofile::where('id', $id)->where('tenant_id', Auth::id())->firstOrFail();
        $tenantprofile->delete();

        return redirect("/tenant/tenantprofiles")->with('success', 'Tenantprofile '.$id.' info deleted successfully');
    }
}
