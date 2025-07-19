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
            'resolved' => (clone $complaints)->where('status', 'Resolved')->count(),
            'inProgress' => (clone $complaints)->where('status', 'In Progress')->count(),
            'archive' => (clone $complaints)->where('status', 'Archived')->count()
        ];

        $complaintData = [
            'latestComplaint' => (clone $complaints)->orderBy('created_at', 'desc')->first(),
            'resolvedComplaint' => (clone $complaints)->orderBy('updated_at', 'desc')->where('status','Resolved')->first()
        ];

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

    public function inProgress()
    {
        $inProgress = auth()->user()
            ->complaints()
            ->where('status','In Progress')
            ->paginate(10);

        return view('user.complaints.in-progress-complaint', compact('inProgress'));
    }

    public function resolved()
    {
        $resolved = auth()->user()
            ->complaints()
            ->where('status','Resolved')
            ->paginate(10);

        return view('user.complaints.resolved-complaint', compact('resolved'));
    }

    public function archived()
    {
        $archived = auth()->user()
            ->complaints()
            ->where('status','Archived')
            ->paginate(10);

        return view('user.complaints.archive-complaint', compact('archived'));
    }



}
