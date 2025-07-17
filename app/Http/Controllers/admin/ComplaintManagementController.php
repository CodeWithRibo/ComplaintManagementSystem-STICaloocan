<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\user\Complaint;
use Illuminate\Http\Request;

class ComplaintManagementController extends Controller
{
    public function allComplaints()
    {
        $allUserComplaints = Complaint::with('user')->paginate(10);
        return view('admin.ComplaintManagement.all-complaints', compact('allUserComplaints'));
    }
}
