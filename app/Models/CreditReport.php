<?php

namespace App\Models;

use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Database\Eloquent\Model;
use Barryvdh\DomPDF\Facades\Pdf;
use Illuminate\Support\Facades\Auth;

class CreditReport extends Model
{
    protected $fillable = [
        'user_id',
        'on_time_payments',
        'utilization_rate',
        'account_age',
        'credit_mix',
        'new_inquiries',
        'score',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
  
}
