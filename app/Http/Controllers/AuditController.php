<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Audit;


class AuditController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'from' => 'nullable|date|date_format:Y-m-d',
            'to' => 'nullable|date|date_format:Y-m-d',
        ]);
        if(isset($validated['from']) && isset($validated['to'])){
            $audit = \App\Models\Audit::whereBetween('created_at', [$validated['from'], $validated['to']])->orderBy('created_at')->paginate(10);
        } else if(isset($validated['from'])){
            $audit = \App\Models\Audit::where('created_at', '>=', $validated['from'])->orderBy('created_at')->paginate(10);
        } else if(isset($validated['to'])){
            $audit = \App\Models\Audit::where('created_at', '<=', $validated['to'])->orderBy('created_at')->paginate(10);
        } else {
            $audit = \App\Models\Audit::orderBy('created_at')->paginate(10);
        }

        return response()->json($audit);
    }
}
