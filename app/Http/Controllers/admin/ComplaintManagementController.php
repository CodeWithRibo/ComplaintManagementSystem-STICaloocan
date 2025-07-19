<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComplaintRequest;
use App\Models\user\Complaint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ComplaintManagementController extends Controller
{
    public function allComplaints(): View
    {
        $allUserComplaints = Complaint::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('admin.ComplaintManagement.all-complaints', compact('allUserComplaints'));
    }

    public function showResolutionNote(Complaint $complaint): View
    {
        return view('admin.ComplaintManagement.add-resolution-note', compact('complaint'));
    }

    public function resolutionNote(Request $request, Complaint $complaint): RedirectResponse
    {
        $validate = $request->validate([
            'resolution_note' => 'required|string',
            'resolved_on' => ['required', 'date', 'before_or_equal:' . now()->format('Y-m-d H:i:s')]
        ]);
        noty()
            ->theme('relax')
            ->success('Resolution Note Added!');
        $complaint->update($validate);
        $complaint->save();
        return redirect()->route('admin.index');
    }

    public function showProgressNote(Complaint $complaint): View
    {
        return view('admin.ComplaintManagement.progress-note', compact('complaint'));
    }

    public function progressNote(Complaint $complaint, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'progress_note' => 'required|string',
        ]);

        noty()
            ->theme('relax')
            ->success('Progress Note Added!');
        $complaint->update($validate);
        $complaint->save();
        return redirect()->route('admin.index');
    }

    public function inProgress(Complaint $complaint): RedirectResponse
    {
        $complaint->update(['status' => 'In Progress']);
        $complaint->save();
        return back();
    }

    public function resolved(Complaint $complaint): RedirectResponse
    {
        $complaint->update(['status' => 'Resolved']);
        $complaint->save();
        return back();
    }

    public function archived(Complaint $complaint): RedirectResponse
    {
        $complaint->update(['status' => 'Archived']);
        $complaint->save();
        return back();
    }

    public function showEditComplaint(Complaint $complaint)
    {
        return view('admin.ComplaintManagement.edit-complaint', compact('complaint'));
    }

    public function editComplaint(Complaint $complaint, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'category' => ['required', 'string'],
            'location' => ['nullable', 'string', 'min:6', 'max:50', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'title' => ['required', 'string', 'min:6', 'max:30', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'description' => ['required', 'string', 'min:10', 'max:4000'],
            'incident_time' => ['required', 'date', 'before_or_equal:' . now()->format('Y-m-d H:i:s')],
            'priority' => ['required', 'string'],
            'status' => ['required', 'string'],
            'image_path' => ['nullable', 'image', 'max:5000', 'mimes:jpg,png,jpeg'],
            'type_submit' => ['required', 'string'],
            'full_name' => ['nullable'],
            'student_id_number' => ['nullable'],
            'email' => ['nullable'],
            'phone_number' => ['nullable', 'max:11', 'regex:/^[0-9]+$/'],
            'year_section' => ['nullable'],
            'complaint_tracker' => ['nullable']
        ]);


        if ($request->hasFile('image_path')) {
            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('student_complaint_image'), $imageName);
            $validate['image_path'] = $imageName;
        }

        $complaint->update($validate);
        $complaint->save();
        noty()
            ->theme('relax')
            ->success('Complaint has been updated successfully!');
        return redirect()->route('admin.index');
    }

    public function showPending(): View
    {
        $pending = Complaint::with('user')
            ->orderBy('created_at', 'desc')
            ->where('status', 'Pending')
            ->paginate(10);
        return view('admin.ComplaintManagement.pending-complaints', compact('pending'));
    }

    public function showInProgress(): View
    {
        $progress = Complaint::with('user')
            ->orderBy('created_at', 'desc')
            ->where('status', 'In Progress')
            ->paginate(10);
        return view('admin.ComplaintManagement.in-progress-complaints', compact('progress'));
    }

    public function showResolved(): View
    {
        $resolved = Complaint::with('user')
            ->orderBy('created_at', 'desc')
            ->where('status','Resolved')
            ->paginate(10);
        return view('admin.ComplaintManagement.resolved-complaints', compact('resolved'));
    }

    public function showArchived(): View
    {
        $archived = Complaint::with('user')
            ->orderBy('created_at', 'desc')
            ->where('status','Archived')
            ->paginate(10);
        return view('admin.ComplaintManagement.archived-complaints', compact('archived'));
    }

}

