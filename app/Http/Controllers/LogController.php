<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $logs = Log::with('user')
                ->where('action', 'like', "%$search%")
                ->orWhere('module', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%")
                ->orderBy('created_at', 'desc')
                ->paginate(50)
                ->appends(['search' => $search]);
        } else {
            $logs = Log::with('user')->orderBy('created_at', 'desc')->paginate(50);
        }

        return view('logs.activity', compact('logs'));
    }

    public function destroy($id)
    {
        $log = Log::findOrFail($id);
        $log->delete();

        return redirect()->back()->with('success', 'Log deleted successfully');
    }

    public function clear()
    {
        Log::truncate();
        return redirect()->back()->with('success', 'All logs cleared');
    }
}
