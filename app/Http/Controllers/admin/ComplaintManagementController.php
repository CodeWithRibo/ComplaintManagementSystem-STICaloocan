<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\user\Complaint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComplaintManagementController extends Controller
{
    public function allComplaints() : View
    {
        $allUserComplaints = Complaint::with('user')->paginate(10);
        return view('admin.ComplaintManagement.all-complaints', compact('allUserComplaints'));
    }

    public function showResolutionNote(Complaint $complaint) : View
    {
        return view('admin.ComplaintManagement.add-resolution-note', compact('complaint'));
    }

    public function resolutionNote(Request $request, Complaint $complaint) : RedirectResponse
    {
        $validate = $request->validate([
            'resolution_note' => 'required|string',
            'status' => 'required|string',
            'resolved_on' => ['required', 'date', 'before_or_equal:' . now()->format('Y-m-d H:i:s')]
        ]);
        noty()
            ->theme('relax')
            ->success('Resolution Note Added!');
        $complaint->update($validate);
        return redirect()->route('admin.all-complaints');
    }


}
