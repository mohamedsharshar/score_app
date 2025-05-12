<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreditScoreController;

Route::middleware('auth')->group(function () {
    Route::get('/credit', [CreditScoreController::class, 'showForm'])->name('credit.form');
    Route::post('/credit', [CreditScoreController::class, 'calculate'])->name('credit.calculate');
});
Route::get('/history', [CreditScoreController::class, 'history'])->name('history');
Route::get('/export', [CreditScoreController::class, 'export'])->name('export');
Route::get('/tips', fn() => view('credit.tips'))->name('tips');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
});
