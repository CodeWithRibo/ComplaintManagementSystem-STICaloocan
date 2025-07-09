<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    public function __invoke(Request $request)
    {
        $query = Complaint::query();
        $search = $request->input('search');

        $complaintData = $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('complaint_tracker', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('user.complaints.list-complaint', compact('complaintData'));
    }
}
