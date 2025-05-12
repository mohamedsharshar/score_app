<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\CreditReport;
use Illuminate\Support\Facades\Auth;

class CreditScoreController extends Controller
{
    public function showForm() {
        return view('credit.form');
    }

    public function calculate(Request $req) {
        $data = $req->validate([
            'on_time_payments' => 'required|integer|min:0|max:100',
            'utilization_rate' => 'required|integer|min:0|max:100',
            'account_age'      => 'required|integer|min:0',
            'credit_mix'       => 'required|integer|min:0|max:100',
            'new_inquiries'    => 'required|integer|min:0',
        ]);

        // Weights
        $weights = [
            'on_time_payments' => 0.35,
            'utilization_rate' => 0.30,
            'account_age'      => 0.15,
            'credit_mix'       => 0.10,
            'new_inquiries'    => 0.10,
        ];

        // Normalize account_age into a 0–100 scale (e.g., cap at 120 months)
        $normalizedAge = min($data['account_age'], 120) / 120 * 100;

        // Normalize inquiries (fewer is better). Map 0–10 inquiries to 100–0
        $normalizedInquiries = max(0, 10 - min($data['new_inquiries'], 10)) / 10 * 100;

        // compute weighted sum
        $score = (
            $data['on_time_payments'] * $weights['on_time_payments'] +
            (100 - $data['utilization_rate']) * $weights['utilization_rate'] +
            $normalizedAge * $weights['account_age'] +
            $data['credit_mix'] * $weights['credit_mix'] +
            $normalizedInquiries * $weights['new_inquiries']
        ) / 100 * 550 + 300;

        $score = round($score);

        // Save report
        $report = CreditReport::create([
            'user_id'            => Auth::id(),
            'on_time_payments'   => $data['on_time_payments'],
            'utilization_rate'   => $data['utilization_rate'],
            'account_age'        => $data['account_age'],
            'credit_mix'         => $data['credit_mix'],
            'new_inquiries'      => $data['new_inquiries'],
            'score'              => $score,
        ]);

        return view('credit.result', compact('report'));
    }
      public function history()
    {
        $reports = CreditReport::where('user_id', Auth::id())->latest()->get();
        return view('credit.history', compact('reports'));
    }

    public function export()
    {
        $reports = CreditReport::where('user_id', Auth::id())->get();
        $pdf = Pdf::loadView('credit.export', ['reports' => $reports]);
        return $pdf->download('credit_report.pdf');
    }
}
