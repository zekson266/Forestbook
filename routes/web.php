<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Uniprom;

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

// Route::post('/uniprom', function (Request $request) {

//     $data = $request->json()->all();

//     //\Log::info('Received data:', $data);

//     $jsonData = json_encode($data);

//     $fileName = 'log_' . now()->format('Y-m-d_H-i-s') . '.json';

//     $directory = storage_path('logs');

//     if (!file_exists($directory)) {
//         mkdir($directory, 0755, true);
//     }

//     file_put_contents("{$directory}/{$fileName}", $jsonData);

//      return response()->json(['status' => ['code' => 200, 'errortext' => 'OK']]);
// });

Route::post('/uniprom', function (UpdateUnipromRequest $request) {

    Uniprom::upsert($request->validated(),['guid']);

     return response()->json(['status' => ['code' => 200, 'errortext' => 'OK']]);
});