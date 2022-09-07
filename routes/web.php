<?php

use App\Models\Album;
use App\Models\Awards;
use App\Models\Filmography;
use App\Models\MemberProfile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\GalleryController;

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
    return view('gate', [
        'title' => 'WANNA ONE'
    ]);
});

Auth::routes(['verify' => true]);

Route::get('/profile', function () {
    return view('profile', [
        'title' => 'Profile',
        'awards' => Awards::all(),
        'filmographies' => Filmography::all(),
        'memberProfiles' => MemberProfile::all()
    ]);
});

Route::get('/discography', function () {
    return view('discography', [
        'title' => 'Discography',
        'albums' => Album::all()
    ]);
});


Route::get('/gallery', [GalleryController::class, 'index']);

Route::get('/activity', [App\Http\Controllers\ActivityController::class, 'index']);
Route::post('/activity/action', [App\Http\Controllers\ActivityController::class, 'action']);

Route::get('/forum', [App\Http\Controllers\PostController::class, 'index'])->middleware('verified');

Route::get('/{user:username}', [App\Http\Controllers\ForumController::class, 'showw']);

Route::post('/like', [App\Http\Controllers\PostController::class, 'likePost']);

Route::resource('/{user:username}/posts', App\Http\Controllers\PostController::class);

Route::resource('/posts', App\Http\Controllers\PostController::class)->middleware('auth');

Route::resource('/user', App\Http\Controllers\UserController::class)->middleware('auth');



