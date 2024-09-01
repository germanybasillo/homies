<?php

namespace App\Http\Controllers\Rental_Owner;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Replyowner;
use App\Models\Tenantprofile;

class ReplyOwnerController extends Controller
{
    public function index(): View
    {
        return view('rental_owner.replyowner.view', [
            'replyowners' => Replyowner::all(),
            'tenantprofiles' => Tenantprofile::all(),
            'suggestions' => Suggestion::all()
        ]);
    }

    public function create(): View
    {
        return view('rental_owner.replyowner.add');
    }

    public function show(string $id): View
    {
        return view('rental_owner.replyowner.edit', [
        'replyowners' => Replyowner::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tenantprofile_id' => 'required|exists:tenantprofiles,id',
            'suggestion_id' => 'required|exists:suggestions,id',
            'reply' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        $replyowner= new Replyowner ($request->all());
        $replyowner->save();
        return redirect('/rental_owner/replyowners')->with('sucess',"Replyowner Data Has Been inserted");
    }

    public function update(Request $request, $id) {
         $request->validate([
            'tenantprofile_id' => 'required|exists:tenantprofiles,id',
            'suggestion_id' => 'required|exists:suggestions,id',
            'reply' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);
    
        $replyowner = Replyowner::find($id);
        $replyowner->update($request->all());
    
        return redirect('/rental_owner/replyowners')->with('sucess',"Replyowner Data Has Been updated");
    }

    public function destroy($id)
    {
      $replyowner = Replyowner::find($id);
      $replyowner->delete();
      return redirect('/rental_owner/replyowners')
        ->with('success', 'Replyowner '.$id.'info deleted successfully');
    }
}
