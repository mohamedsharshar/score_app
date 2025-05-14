<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Analysis;
class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

public function show($id)
{
    $user = User::with('creditReport')->find($id);

    if ($user) {
        $report = $user->creditReport;

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'on_time_payments' => $report->on_time_payments ?? null,
            'utilization_rate' => $report->utilization_rate ?? null,
            'account_age' => $report->account_age ?? null,
            'credit_mix' => $report->credit_mix ?? null,
            'new_inquiries' => $report->new_inquiries ?? null,
            'score' => $report->score ?? null,
            'created_at' => $user->created_at->toDateString(),
        ]);
    } else {
        return response()->json(['error' => 'العميل غير موجود'], 404);
    }
}


}
