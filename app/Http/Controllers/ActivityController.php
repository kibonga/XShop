<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ActivityController extends Controller
{

    public function index(Request $request) {
        // Policy
        $this->authorize('viewAny', Activity::class);
        try {
            if($request->method() == "POST") {
                $start = Carbon::parse($request->start);
                $end = Carbon::parse($request->end);
                $users = Activity::with('user')->whereDate('created_at', '<=', $end)
                    ->whereDate('created_at', '>=', $start)
                    ->paginate(10);
            }
            else if($request->method() == "GET") {
                $users = Activity::with('user')->paginate(10);
            }

            return view('admin.activities.index')->with([
                'activities' => $users
            ]);
        }
        catch (\Exception $exception) {
            $uniqueId = uniqid();
            \Log::error($uniqueId . " " . $exception->getMessage());
            return redirect()->back()->withErrors(['We encountered an error.', 'Error ID: ' . $uniqueId]);
        }
    }

}
