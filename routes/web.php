<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketInformationController;

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

Route::get('/dashboard', [TicketInformationController::class, 'index'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::patch('/ticket/register', [TicketInformationController::class, 'update'])->name('ticket.register');
Route::post('/ticket/import', [TicketInformationController::class, 'import'])->name('ticket.import');

require __DIR__.'/auth.php';
