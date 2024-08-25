<?php
namespace App\Http\Controllers\Rental_Owner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\BedSelect;
use Illuminate\Support\Facades\Auth;
class BedSelectController extends Controller
{
    public function index(): View
    {
        return view('rental_owner.bedselected.view', [
            'bedselects' => BedSelect::all()
        ]);
    }

    public function create(): View
    {
        return view('rental_owner.bedselected.add', [
            'bedselects' => BedSelect::all() // Pass the tenant profiles to the view
        ]);
    }

    public function show(string $id): View
    {
        return view('rental_owner.bedselected.edit', [
            'bedselects' => BedSelect::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'bed_no' => 'required|string',
                'daily_rate' => 'required|string',
                'monthly_rate' => 'required|string',
                'bed_status' => 'required|in:available,occupied',
                
            ]
        );
        $bedselect= new BedSelect($request->all());
        $bedselect->save();
        return redirect('/rental_owner/bedselects')->with('sucess',"Bed-Select Data Has Been inserted");
    }

    public function update(Request $request, $id) {
        $request->validate(
            [
                'bed_no' => 'required|string',
                'daily_rate' => 'required|string',
                'monthly_rate' => 'required|string',
                'bed_status' => 'required|in:available,occupied',
            ]);
    
        $bedselect = BedSelect::find($id);
        $bedselect->update($request->all());
    
        return redirect('/rental_owner/bedselects')->with('sucess',"Bed-Select Data Has Been updated");
    }

    public function destroy($id)
    {
      $bedselect = BedSelect::find($id);
      $bedselect->delete();
      return redirect('/rental_owner/bedselects')
        ->with('success', 'Bed-Select '.$id.'info deleted successfully');
    }
}
