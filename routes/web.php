<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/calendar/{year}/{month}/{day}', [CalendarController::class, 'show'])->name('calendar.show');
Route::get('/reserve/{year}/{month}/{day}', [CalendarController::class, 'reserve']);
Route::post('/your-server-endpoint/{year}/{month}/{day}', [CalendarController::class, 'create']);
Route::get('/edit/{id}', [CalendarController::class, 'edit']);
Route::post('/edit/{year}/{month}/{day}', [CalendarController::class, 'update']);
Route::post('/delete/{year}/{month}/{day}', [CalendarController::class, 'delete']);

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);
});
