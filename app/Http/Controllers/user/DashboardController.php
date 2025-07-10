<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function welcome()
    {
        return view('user.welcome');
    }

    public function profile()
    {
        return view('user.dashboard.profile');
    }
    public function termsConditions()
    {
        return view('user.terms-conditions');
    }

    public function privacyPolicy()
    {
        return view('user.privacy-policy');
    }

    public function faq()
    {
        return view('user.dashboard.faq');
    }
    public function home()
    {
        $complaints = auth()->user()->complaints();

        $count = [
            'pending' => (clone $complaints)->where('status', 'Pending')->count(),
            'resolved' => (clone $complaints)->where('status', 'Resolved')->count()
        ];

        $complaintData = (clone $complaints)
        ->orderBy('updated_at', 'desc')->first();
        return view('user.dashboard.home', compact('count', 'complaintData'));
    }
    public function listComplaint()
    {
        $complaintData = auth()->user()
            ->complaints()
            ->orderBy('updated_at', 'desc')
            ->paginate(10);

        return view ('user.complaints.list-complaint', compact('complaintData'));
    }

    public function pending()
    {
        $pending = auth()->user()
            ->complaints()
            ->where('status','Pending')
            ->paginate(10);

        return view('user.complaints.pending-complaint', compact('pending'));
    }

    public function resolved()
    {
        $resolved = auth()->user()
            ->complaints()
            ->where('status','Resolved')
            ->paginate(10);

        return view('user.complaints.resolved-complaint', compact('resolved'));
    }

}
