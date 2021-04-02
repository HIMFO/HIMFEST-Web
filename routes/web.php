<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/upload-file', [FileController::class, 'create'])
    ->middleware(['auth'])->name('dashboard.upload-file');

Route::post('/dashboard/upload-file', [FileController::class, 'store'])
    ->middleware(['auth'])->name('dashboard.upload-file');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';