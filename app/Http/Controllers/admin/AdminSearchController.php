<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\user\Complaint;
use Illuminate\Http\Request;

class AdminSearchController extends Controller
{

    public function __invoke(Request $request)
    {
        $search = $request->input('search');

        $allUserComplaints = Complaint::with('user')->where('title', 'like', '%' . $search . '%')
            ->orWhere('complaint_tracker', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('admin.ComplaintManagement.all-complaints', compact('allUserComplaints'));
    }
}
