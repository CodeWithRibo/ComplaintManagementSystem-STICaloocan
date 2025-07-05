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

    public function profile()
    {
        return view('dashboard.profile');
    }

    public function termsConditions()
    {
        return view('terms-conditions');
    }

    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function faq()
    {
        return view('dashboard.faq');
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

    public function pending()
    {
        $pending = auth()->user()
            ->complaints()
            ->where('status','Pending')
            ->paginate(10);

        return view('complaints.pending-complaint', compact('pending'));
    }

    public function resolved()
    {
        $resolved = auth()->user()
            ->complaints()
            ->where('status','Resolved')
            ->paginate(10);

        return view('complaints.resolved-complaint', compact('resolved'));
    }

}
