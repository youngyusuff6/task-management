<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
})->name('home');

//TAKS FUNCTIONS
Route::get('/tasks', [TaskController::class, 'index'])->name('all-task');
Route::get('/add/tasks', [TaskController::class, 'showAddTask'])->name('show-add-task');
Route::post('/add/task', [TaskController::class, 'addTask'])->name('add-task');
Route::get('/edit/task/{id}', [TaskController::class, 'showEditTask'])->name('edit-task');
Route::put('/edit/tasks/{id}', [TaskController::class, 'editTask'])->name('edit-tasks');
Route::get('/delete/task/{id}', [TaskController::class, 'deleteTask'])->name('delete-task');
//GET TASKS BY PROJECT
Route::get('/tasks/by-project/{id}', [TaskController::class, 'tasksByProject'])->name('tasks-by-project');


