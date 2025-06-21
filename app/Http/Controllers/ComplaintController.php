<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintRequest;
use App\Models\Complaint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $imageName = time() . '.' . $request->image_path->extension();
        $request->image_path->move(public_path('student_complaint_image'), $imageName);

        $query = Complaint::query();
        $query->create([
            'user_id' => auth()->id(),
            'image_path' => $imageName,
            ...$validated]);
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
