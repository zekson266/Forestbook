<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    return view('index');
});

require __DIR__.'/auth.php';

Route::view('/home','index')->name('home');

Route::middleware('can:AdminRole')->group(function () {
    Route::view('/admin','admin.index')->name('admin.home');
});


Route::post('/uniprom', function (Request $request) {

    $data = $request->json()->all();

    $jsonData = json_encode($data);

    $fileName = 'log_' . now()->format('Y-m-d_H-i-s') . '.json';

    $directory = storage_path('logs');

    Storage::put("{$directory}/{$fileName}", $jsonData);

    return response()->json(['message' => 'Data saved to log file successfully'], 200);
});