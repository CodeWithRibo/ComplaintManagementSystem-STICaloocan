<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
          $query = Complaint::query();
          $complaint = $query
              ->orderBy('title','ASC')
              ->paginate(20);
          return view('welcome',['complaints' => $complaint]);
    }

    public function create()
    {
        return view('ComplaintForm');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'description'=>'required|string|min:10|max:300',
            'categorySelection' => 'required',
            'priorityLevel' => 'required',
            'timeIncident' => 'required'
        ]);
        $query = Complaint::query();
        $query -> create($validate);

        redirect('/');
    }


    public function show(Complaint $complaint)
    {
        return view('View',['lists' => $complaint]);
    }

    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
