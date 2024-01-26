<?php

use App\Http\Controllers\ProfileController;
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
    return redirect("/login");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    //再起動APIのルーティング
    Route::post("/api/reboot", [\App\Http\Controllers\Api\RebootApiController::class, "reboot"]);

    //バックアップAPIのルーティング
    Route::post("/api/backup", [\App\Http\Controllers\Api\BackupApiController::class, "backup"]);

    //ブロードキャストAPIのルーティング
    Route::post("/api/broadcast", [\App\Http\Controllers\Api\BroadcastApiController::class, "broadcast"]);



});

require __DIR__.'/auth.php';
