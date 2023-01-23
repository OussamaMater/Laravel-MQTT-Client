<?php

use App\Http\Livewire\MainBoard;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Settings;
use App\Http\Livewire\UserLogs;
use Illuminate\Support\Facades\Route;

Route::middleware([
    'auth',
    'verified'
])->group(function () {
    Route::get('/', MainBoard::class)
        ->name('home');

    Route::get('logs', UserLogs::class)
        ->name('logs');

    Route::get('settings', Settings::class)
        ->name('settings');
});

Route::get('profile', Profile::class)
    ->middleware('auth')
    ->name('profile');
