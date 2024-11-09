<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashbookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('posts.cashbook');
})->middleware(['auth', 'verified']); // 認証と確認を要求


Route::get('/dashboard', function () {
    return view('posts.cashbook'); // cashbook.blade.phpを表示
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/cashbook',[CashbookController::class,'index'])->name('cashbook.index');
Route::post('/cashbook',[CashbookController::class,'store'])->name('cashbook.store');

Route::get('/submit',[CashbookController::class,'store'])->name('submit');
Route::post('/submit',[CashbookController::class,'store'])->name('submit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
