<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }
    public function home()
    {
        $countPending = auth()->user()
            ->complaints()
            ->where('status', 'Pending')
            ->count();

        $complaintData = auth()->user()->complaints()->orderBy('updated_at', 'desc')->first();
        return view('dashboard.home', ['countPending' => $countPending, 'complaintData' => $complaintData]);
    }
    public function listComplaint()
    {
        $complaintData = auth()->user()
            ->complaints()
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view ('complaints.list-complaint', compact('complaintData'));
    }

}
