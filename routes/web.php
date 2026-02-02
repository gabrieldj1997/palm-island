<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use App\Models\Game;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => '/games', 'as' => 'game.'], function () {
        //front
        Route::get('/', [GameController::class, 'index'])->name('index');
        Route::get('/card', [GameController::class, 'getAllCards'])->name('card');
        Route::get('/card/{card}', [GameController::class, 'getCard']);
        //Game
        Route::post('/create', [GameController::class, 'create']);
        //Actions
        Route::get('/{id}/discard', [GameController::class, 'discard']);
        Route::post('/{id}/purchasecard', [GameController::class, 'purchaseCard']);
        Route::post('/{id}/rotatecard', [GameController::class, 'rotateCard']);
        Route::post('/{id}/flipcard', [GameController::class, 'flipCard']);
        Route::get('/{id}/endturn', [GameController::class, 'endTurn']);
    });
});

require __DIR__.'/auth.php';
