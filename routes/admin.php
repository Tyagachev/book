<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\isAdminMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Genre\GenreController;
use App\Http\Controllers\Admin\Subgenre\SubgenreController;

/*Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')
    ->prefix('admin')
    ->middleware(['auth', isAdminMiddleware::class]);
Route::post('dashboard/create', [DashboardController::class, 'store'])->prefix('admin')
    ->middleware(['auth', isAdminMiddleware::class]);;
Route::prefix('admin')->name('admin.')->middleware(['auth', isAdminMiddleware::class])->group(function () {

});*/

Route::prefix('admin')->middleware(['auth', isAdminMiddleware::class])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('dashboard/create', [DashboardController::class, 'store']);
    /*Route::resource('dashboard', DashboardController::class);*/

    //Юзеры
    Route::get('user', [UserController::class, 'index'])->name('user.index');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/show/{user}', [UserController::class, 'show'])->name('user.show');
    Route::delete('user/destroy/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    // Жанры
    Route::get('genre', [GenreController::class, 'index'])->name('genre.index');
    Route::post('genre/store', [GenreController::class, 'store'])->name('genre.store');
    Route::delete('genre/destroy/{genre}', [GenreController::class, 'destroy'])->name('genre.destroy');

    // Поджанры
    Route::get('subgenre', [SubgenreController::class, 'index'])->name('subgenre.index');
    Route::post('subgenre/store', [SubgenreController::class, 'store'])->name('subgenre.store');
    Route::delete('subgenre/destroy/{subgenre}', [SubgenreController::class, 'destroy'])
        ->name('subgenre.destroy');
});
