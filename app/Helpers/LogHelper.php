<?php

use App\Models\Log;

if (!function_exists('log_activity')) {
    function log_activity($action, $module, $description = null)
    {
        Log::create([
            'user_id' => auth()->id(),
            'action' => $action,
            'module' => $module,
            'description' => $description,
            'ip_address' => request()->ip(),
        ]);
    }
}
