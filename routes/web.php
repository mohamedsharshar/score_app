<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CreditScoreController;
use App\Http\Controllers\UserController;



Route::middleware('auth')->group(function () {
    Route::get('/credit', [CreditScoreController::class, 'showForm'])->name('credit.form');
    Route::post('/credit', [CreditScoreController::class, 'calculate'])->name('credit.calculate');
});
Route::get('/history', [CreditScoreController::class, 'history'])->name('history');
Route::get('/export', [CreditScoreController::class, 'export'])->name('export');
Route::get('/tips', fn() => view('credit.tips'))->name('tips');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        $user = \Illuminate\Support\Facades\Auth::user();
        if ($user && $user->is_admin) {
            return view('dashboard');
        } else {
            return view('user-dashboard');
        }
    })->name('dashboard');
});

