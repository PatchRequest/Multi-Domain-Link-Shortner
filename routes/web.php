<?php

use App\Models\Domain;
use Illuminate\Support\Facades\Route;

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
    $domains = Domain::all();
    return view('welcome'   , compact('domains'));
});


Route::domain('geheim.gg')->group(function () {

    Route::get('/dashboard', function () {

        if(auth()->user()->premium_expire < now()){
            auth()->user()->premium = false;
            auht()->user()->premium_expire = null;
            auth()->user()->save();
        }

        if(auth()->user()->premium ) {
            $domains = Domain::all();
        }else {
            $domains = Domain::where('premium', false)->get();
        }
        return view('dashboard', compact('domains'));
    })->middleware(['auth'])->name('dashboard');

    Route::resource('/links', \App\Http\Controllers\LinkController::class,[
        'names' => [
            'index' => 'links',
            'create' => 'links.create',
            'store' => 'links.store',
            'show' => 'links.show',
            'edit' => 'links.edit',
            'update' => 'links.update',
            'destroy' => 'links.destroy',
        ]
    ])->middleware(['auth'])->except('edit', 'update');

    Route::resource('/domains', \App\Http\Controllers\DomainController::class, [
        'names' => [
            'index' => 'domains',
            'create' => 'domains.create',
            'store' => 'domains.store',
            'show' => 'domains.show',
            'edit' => 'domains.edit',
            'update' => 'domains.update',
            'destroy' => 'domains.destroy',
        ]
    ])->middleware(['auth','is_admin'])->except('edit');
    Route::get("/users", [\App\Http\Controllers\UserController::class,'index'])->middleware(['auth','is_admin'])->name('users');
    Route::patch("/users/{user}", [\App\Http\Controllers\UserController::class,'toggle'])->middleware(['auth','is_admin'])->name('users.toggle');
    require __DIR__.'/auth.php';
});

Route::any('/{any}', [\App\Http\Controllers\LinkController::class,'useLink'])->where('any', '.*');



