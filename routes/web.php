<?php

use App\Http\Controllers\TicketRegistrationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('ticket-registration');
})->name('ticket-registrations.create');

Route::post('/ticket-registrations', [TicketRegistrationController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('ticket-registrations.store');
