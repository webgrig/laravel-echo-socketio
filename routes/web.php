<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Events\Message;
use App\Events\PrivateChat;
use App\Http\Controllers\HomeController;

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
    return view('chat');
});

    Route::post('/messages', function (Request $request){
        PrivateChat::dispatch($request->all());
    });

    Route::get('/room/{room}', function (Room $room){
        return view('room', ['room' => $room]);
    });

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
