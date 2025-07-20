<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\user\Complaint;
use App\Models\user\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $userComplaints = Complaint::with('user')->orderBy('created_at', 'desc')->take(5)->paginate(10);
        return view('admin.dashboard.index', compact('userComplaints'));
    }
}
