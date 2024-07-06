<?php

namespace App\Http\Controllers\Rental_Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\View\View;

class BillController extends Controller
{
    public function index(): View
    {
        return view('rental_owner.bill.view', [
            'bills' => Bill::all()
        ]);
    }

    public function create(): View
    {
        return view('rental_owner.bill.add');
    }

    public function show(string $id): View
    {
        return view('rental_owner.bill.edit', [
            'bill' => Bill::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'utility' => 'required|string',
                'bill' => 'required|string',
            ]
        );
        $bill= new Bill($request->all());
        $bill->save();
        return redirect('/rental_owner/bills')->with('sucess',"Bill Data Has Been inserted");
    }

    public function update(Request $request, $id) {
        $request->validate(
            [
                'utility' => 'required|string',
                'bill' => 'required|string',
            ]);
    
        $bill = Bill::find($id);
        $bill->update($request->all());
    
        return redirect('/rental_owner/bills')->with('sucess',"Bill Data Has Been updated");
    }

    public function destroy($id)
    {
      $bill = Bill::find($id);
      $bill->delete();
      return redirect('/rental_owner/bills')
        ->with('success', 'Bill '.$id.'info deleted successfully');
    }
}
