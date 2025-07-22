<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Activitylog\Models\Activity;

class AuditLogsController extends Controller
{
    public function showActivityLogs() : View
    {
        $logs = Activity::where('log_name', 'default')
            ->with('causer')
            ->latest()
            ->paginate(10);
        return view('admin.AuditLogs.ActivityLogs', compact('logs'));
    }
}
