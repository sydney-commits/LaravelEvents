<?php

use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PdfController;

// Route::get('sendbasicemail','MailController@basic_email');

Route::get('send-notification',[InvoiceController::class,'sendNotification']);

Route::get('email-test', function(){
  
    $details['email'] = 'sydneysunya@gmail.com';
  
    dispatch(new App\Jobs\SendEmailJob($details));
  
    dd('done');
});

Route::get('/genPDF', [PdfController::class, 'generatePdf']);

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
