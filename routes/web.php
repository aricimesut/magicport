<?php

use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\ProjectController;
use App\Http\Controllers\Web\TaskController;
use Illuminate\Support\Facades\Route;

//send to login page
Route::get('/', [AuthController::class, 'index']);
Route::get('/login', [AuthController::class, 'index'])->name("login");
Route::post('/sign-in', [AuthController::class, 'login'])->name("sign-in");

//auth routes
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name("logout");
    Route::get('/home', [HomeController::class, 'index'])->name("home");

    //route for project
    Route::prefix('project')
        ->group(function () {
            Route::get('/datatable', [ProjectController::class, 'datatable'])->name('project.datatable');
            Route::get('/{id}', [ProjectController::class, 'show'])->name('project.show');
            Route::delete('/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
        });

    //routes for tasks
    Route::prefix('task')
        ->group(function () {
            Route::post('/', [TaskController::class, 'store'])->name('task.add');
            Route::delete('/{id}', [TaskController::class, 'destroy'])->name('task.destroy');
            Route::get('/{id}', [TaskController::class, 'edit'])->name('task.edit');
            Route::put('/{id}', [TaskController::class, 'update'])->name('task.update');
        });
});
