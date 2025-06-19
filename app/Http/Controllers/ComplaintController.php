<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{

    public function index()
    {
          $query = Complaint::query();
          $complaint = $query
              ->orderBy('title','ASC')
              ->paginate(20);
          return view('complaints.data',['complaints' => $complaint]);
    }

    public function create()
    {
        return view('complaints.ComplaintForm');
    }

    public function store(Request $request) : RedirectResponse
    {
        $validate = $request->validate([
         'title' => 'required|string|max:255',
         'description'=>'required|string|min:10|max:300',
         'categorySelection' => 'required',
         'priorityLevel' => 'required',
         'timeIncident' => 'required'
        ]);
         $query = Complaint::query();
         //UNDER DEVELOPMENT
         $query->create([$validate]);
        return redirect()->route('index');
    }


    public function show(Complaint $complaint)
    {
        return view('View',['lists' => $complaint]);
    }

    public function edit(Complaint $complaint)
    {
        return view('Update',['data'=>$complaint]);
    }

    public function update(Request $request, Complaint $complaint) : RedirectResponse
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description'=>'required|string|min:10|max:300',
            'categorySelection' => 'required',
            'priorityLevel' => 'required',
            'timeIncident' => 'required'
        ]);

        $complaint->update($validate);
        return redirect()->route('index');
    }

    public function destroy(Complaint $complaint): RedirectResponse
    {
        $complaint->delete();
        return redirect()->route('index');
    }
}
