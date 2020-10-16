<?php

use App\Http\Controllers\MemeController;
use App\Models\Meme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

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

Route::get('/', function (Request $request) {
    $memes = Cache::remember($request->fullUrl(), now()->addHour(), function () {
        return Meme::orderBy('created_at', 'DESC')->paginate(5);
    });
    return view('welcome', compact('memes'));
})->name('meme:list');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("/memes", [MemeController::class, 'index']);
Route::post("/memes", [MemeController::class, 'store']);
Route::get("/memes/content/{memeName}", [MemeController::class, 'loadMeme']);
