<?php

use App\Http\Controllers\AirportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AirportController::class, 'index'])->name('index')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

Route::resource('airport', AirportController::class);

Route::get('pegawai', [AirportController::class, 'pegawai'])->name('pegawai');
Route::get('userlist', [AirportController::class, 'userlist'])->name('userlist');

// Tampildata
Route::get('tampildata_kedatangan/{id}', [AirportController::class, 'tampildata_kedatangan'])->name('tampildata_kedatangan');
Route::get('tampildata_keberangkatan/{id}', [AirportController::class, 'tampildata_keberangkatan'])->name('tampildata_keberangkatan');
Route::get('tampildata_pegawai/{id}', [AirportController::class, 'tampildata_pegawai'])->name('tampildata_pegawai');
Route::get('tampildata_userlist/{id}', [AirportController::class, 'tampildata_userlist'])->name('tampildata_userlist');

// Tambahdata
Route::get('tambahdata_kedatangan', [AirportController::class, 'tambahdata_kedatangan'])->name('tambahdata_kedatangan');
Route::get('tambahdata_keberangkatan', [AirportController::class, 'tambahdata_keberangkatan'])->name('tambahdata_keberangkatan');
Route::get('tambahdata_pegawai', [AirportController::class, 'tambahdata_pegawai'])->name('tambahdata_pegawai');

// Storedata
Route::get('storedata_kedatangan', [AirportController::class, 'storedata_kedatangan'])->name('storedata_kedatangan');
Route::get('storedata_keberangkatan', [AirportController::class, 'storedata_keberangkatan'])->name('storedata_keberangkatan');
Route::get('storedata_pegawai', [AirportController::class, 'storedata_pegawai'])->name('storedata_pegawai');

// Editdata
Route::get('editdata_kedatangan/{id}', [AirportController::class, 'editdata_kedatangan'])->name('editdata_kedatangan');
Route::get('editdata_keberangkatan/{id}', [AirportController::class, 'editdata_keberangkatan'])->name('editdata_keberangkatan');
Route::get('editdata_pegawai/{id}', [AirportController::class, 'editdata_pegawai'])->name('editdata_pegawai');
Route::get('editdata_userlist/{id}', [AirportController::class, 'editdata_userlist'])->name('editdata_userlist');

// Updatedata
Route::put('updatedata_kedatangan/{id}', [AirportController::class, 'updatedata_kedatangan'])->name('updatedata_kedatangan');
Route::put('updatedata_keberangkatan/{id}', [AirportController::class, 'updatedata_keberangkatan'])->name('updatedata_keberangkatan');
Route::put('updatedata_pegawai/{id}', [AirportController::class, 'updatedata_pegawai'])->name('updatedata_pegawai');
Route::put('updatedata_userlist/{id}', [AirportController::class, 'updatedata_userlist'])->name('updatedata_userlist');

// Hapusdata
Route::delete('hapusdata_kedatangan/{id}', [AirportController::class, 'hapusdata_kedatangan'])->name('hapusdata_kedatangan');
Route::delete('hapusdata_keberangkatan/{id}', [AirportController::class, 'hapusdata_keberangkatan'])->name('hapusdata_keberangkatan');
Route::delete('hapusdata_pegawai/{id}', [AirportController::class, 'hapusdata_pegawai'])->name('hapusdata_pegawai');
Route::delete('hapusdata_userlist/{id}', [AirportController::class, 'hapusdata_userlist'])->name('hapusdata_userlist');

require __DIR__.'/auth.php';
