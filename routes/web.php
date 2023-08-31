<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiscussionsController;
use App\Http\Controllers\RepliesController;
use App\Http\Controllers\UserController;
use App\Events\MyEvent;
use Illuminate\Support\Facades\App;
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
Route::get('/bridge', function() {
    $pusher = App::make('Pusher');

    $pusher->trigger( 'test-channel',
                      'test-event', 
                      array('text' => 'Preparing the Pusher Laracon.eu workshop!'));

    return view('welcome');
});

Route::middleware(['auth:sanctum'])->get('/dashboard', [DiscussionsController::class,'index'])->name('dashboard');

Route::get('discussions/create', [DiscussionsController::class,'create'])->name('disc.create');
Route::get('discussions/show/{slug}', [DiscussionsController::class,'show'])->name('disc.show');
Route::post('discussions/store', [DiscussionsController::class,'store'])->name('disc.store');
Route::post('discussions/{discussion}/replies', [RepliesController::class,'store'])->name('reply.store');
Route::post('discussions/{discussion}/replies/{reply}/mark-as-best-reply', [DiscussionsController::class,'reply'])->name('reply.best');
Route::get('discussions/user/notifications', [UserController::class,'notify'])->name('disc.notify');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
