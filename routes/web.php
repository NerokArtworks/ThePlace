<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\APILikedProjects;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SaveProjectController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('/liked-projects', APILikedProjects::class);
// Route::get('/liked-projects', [APILikedProjects::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/home', function () {
        return view('index');
    })->name('home');

    Route::resource('admin', AdminController::class)->middleware(['auth', 'admin']);

    // La creo encima de resurce('projects') para que no de error
    // ya que pertenece al mismo "dominio" 'projects/'
    Route::get('projects/user-projects', [ProjectController::class, 'userProjects'])
        ->middleware(['auth', 'verified'])
        ->name('user-projects');

    // La creo encima de resurce('projects') para que no de error
    // ya que pertenece al mismo "dominio" 'projects/'
    Route::get('projects/saved-projects', [ProjectController::class, 'savedProjects'])
        ->middleware(['auth', 'verified'])
        ->name('saved-projects');

    Route::resource('projects', ProjectController::class)->middleware(['auth', 'verified']);

    Route::post('save-project/{project}', SaveProjectController::class)->name('save-project');
});
