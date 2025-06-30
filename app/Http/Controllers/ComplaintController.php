<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintRequest;
use App\Models\Complaint;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class ComplaintController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        return view('complaints.submit-form');
    }

    public function store(ComplaintRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        if ($request->has('complaint_tracker')) {
            $query = Complaint::query();
            do {
                $randomNumber = mt_rand(1000, 9000);
                $currentYear = Carbon::now()->year;
                $complaintLog = 'CPL' . '-' . $currentYear . '-' . $randomNumber;
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

        $query = Complaint::query();
        $query->create(['user_id' => auth()->id(),
            ... $validated]);
        noty()
            ->theme('relax')
            ->success('Complaint submitted! We’ve received your report and will take action as soon as possible.');
        return redirect()->route('dashboard.home');
    }

    public function show(string $id)
    {
        //
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
