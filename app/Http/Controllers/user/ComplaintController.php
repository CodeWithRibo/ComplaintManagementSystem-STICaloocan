<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\ComplaintRequest;
use App\Models\Complaint;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('user.complaints.submit-form');
    }

    public function store(ComplaintRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        if ($request->has('complaint_tracker')) {
            $query = Complaint::query();
            do {
                $randomNumber = mt_rand(1000, 9000);
                $currentDay = Carbon::now()->day;
                $complaintLog = 'CPL' . '-' . $currentDay . '-' . $randomNumber;
            }while($query->where('complaint_tracker', $complaintLog)->exists());
            $validated['complaint_tracker'] = $complaintLog;
        }

        if ($request->hasFile('image_path')) {
            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('student_complaint_image'), $imageName);
            $validated['image_path'] = $imageName;
        }

        $count = auth()->user()
            ->complaints()
            ->whereDate('created_at', today())
            ->count();

        if ($count >= 3)
        {
            $formattedDate =  Carbon::parse(today()->toDateString())->format('F jS, Y');
            return redirect()
                ->back()
                ->with('warning', ' You’ve submitted 3 complaints today ' . $formattedDate .  ' Please try again tomorrow.');
        }

        if($request->input('type_submit') != 'Identified') {
            $validated['full_name'] = null;
            $validated['student_id_number'] = null;
            $validated['email'] = null;
            $validated['year_section'] = null;
            $validated['phone_number'] = null;
            $validated['is_anonymous'] = true;
        }

        $query = Complaint::query();
        $query->create(['user_id' => auth()->id(),
            ... $validated]);
        noty()
            ->theme('relax')
            ->success('Complaint submitted! We’ve received your report and will take action as soon as possible.');
        return redirect()->route('dashboard.home');
    }

    public function show()
    {
        $complaintData = auth()->user()
            ->complaints()
            ->orderBy('updated_at', 'desc')
            ->paginate(10);
        return view('user.complaints.show-complaint', compact('complaintData'));
    }

    public function edit(Complaint $complaint)
    {
        return view('user.complaints.edit-complaint' , compact('complaint'));
    }

    public function update(Request $request, Complaint $complaint) : RedirectResponse
    {
        $validated = $request->validate([
            'category' => ['required', 'string'],
            'location' => ['nullable', 'string', 'min:6', 'max:50', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'title' => ['required', 'string', 'min:6', 'max:30', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'description' => ['required', 'string', 'min:10', 'max:4000'],
            'incident_time' => ['required', 'date', 'before_or_equal:' . now()->format('Y-m-d H:i:s')],
            'phone_number' => ['nullable', 'max:11', 'regex:/^[0-9]+$/'],
            'image_path' =>  ['nullable', 'image', 'max:5000', 'mimes:jpg,png,jpeg'],
        ]);

        if($request->input('category') != 'Facilities') {
            $validated['location'] = null;
        }

        if ($request->hasFile('image_path')) {
            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('student_complaint_image'), $imageName);
            $validated['image_path'] = $imageName;
        }

        $complaint->update($validated);
            noty()
                ->theme('relax')
                ->success('Your complaint has been updated successfully!');
        return redirect()->route('complaints.show');
    }

}
