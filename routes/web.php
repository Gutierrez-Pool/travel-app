<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StopController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\WelcomeController;
use App\Models\Day;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class, '__invoke']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Rotte per la pagina Admin

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function() {

        Route::get('/', [DashboardController::class, 'index'])->name('index');

        Route::resource('tours', TourController::class);

        Route::resource('days', DayController::class);
        Route::get('/tours/{id}/days', [DayController::class, 'index'])->name('days.index');

        Route::resource('stops', StopController::class);
        // Route::get('/stops/{}', [StopController::class, 'index'])->name('stops.index');
        Route::get('/days/{id}/stops', [StopController::class, 'index'])->name('stops.index');

    }
);