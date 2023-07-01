<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KanbanController;
use App\Http\Controllers\TaskController;

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

// Route::prefix("kanban")->group(function () {
//     Route::get("/", [KanbanController::class, "index"]);
//     Route::put("/{id}", [KanbanController::class, "update"]);
// });

Route::resource("kanban", KanbanController::class)->except(["create", "destroy", "edit", "show", "store"]);
Route::resource("dashboard/kanban", TaskController::class);
