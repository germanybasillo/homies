<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Suggestion;
class SuggestionController extends Controller
{
    public function index(): View
    {
        // Fetch rooms only for the currently authenticated user
        return view('tenant.suggestion.view', [
            'suggestions' => Suggestion::where('tenant_id', Auth::id())->get()
        ]);
    }

    public function create(): View
    {
        return view('tenant.suggestion.add');
    }

    public function show(string $id): View
    {
        // Fetch the room only if it belongs to the authenticated user
        $suggestion = Suggestion::where('id', $id)
                    ->where('tenant_id', Auth::id())
                    ->firstOrFail();

                    return view('tenant.suggestion.edit', ['suggestion' => $suggestion]);
                }
            
                public function store(Request $request)
                {
                    $request->validate([
                        'suggest' => 'required|string',
                        'date' => 'required|string',
                    ]);
            
                    $suggestion = new Suggestion($request->all());
            
                    // Assign the room to the currently authenticated user
                    $suggestion->tenant_id = Auth::id();
                    $suggestion->save();
            
                    return redirect('/tenant/suggestions')->with('success', "Suggestion has been inserted");
                }
            
                public function update(Request $request, $id)
                {
                    $request->validate([
                        'suggest' => 'required|string',
                        'date' => 'required|string',
                    ]);

                    $suggestion = Suggestion::where('id', $id)
                                ->where('tenant_id', Auth::id())
                                ->firstOrFail();
            
                    $suggestion->update($request->all());
            
                    $suggestion->save();
            
                    return redirect('/tenant/suggestions')->with('success', "Suggestion has been updated successfully");
                }
            
                public function destroy($id)
                {
                    $suggestion = Suggestion::where('id', $id)
                                ->where('tenant_id', Auth::id())
                                ->firstOrFail();
            
                    $suggestion->delete();
            
                    return redirect('/tenant/suggestions')->with('success', 'Suggestion has been deleted successfully');
                }
            }
            