<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/event/{id}', [App\Http\Controllers\HomeController::class, 'show'])->name('event.show');
Route::patch('/admin/event/{id}', [EventController::class, 'update'])->name('event.update');

Route::get('/admin/events', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.events');
Route::get('/admin/settings', [App\Http\Controllers\HomeController::class, 'settings'])->name('admin.settings');
