<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KanbanController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;

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

Route::get('/login', function () {
    return view('login');
});

Route::redirect('/', "/kanban");
Route::resource("kanban", KanbanController::class)->except(["create", "destroy", "edit", "show", "store"]);
Route::resource("dashboard/kanban", TaskController::class);
Route::resource("dashboard/user", UserController::class);
