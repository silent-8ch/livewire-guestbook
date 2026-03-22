<?php

use Illuminate\Support\Facades\Route;

Route::view('/guestbook', 'guestbook')->middleware('throttle:30,1')->name('guestbook');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
