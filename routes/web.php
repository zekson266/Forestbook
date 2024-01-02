<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use App\Http\Requests\UpdateBookRequest;

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

Route::post('/uniprom', function (UpdateBookRequest $request) {

    $data = $request->validated()['goods'];

    if($request->query('pass')===env('UNIPRO_PASSWORD')){
        Book::upsert($data,['guid']);}
    else{
        return response('Access denied',403);//->json(['status' => ['code' => 403, 'errortext' => 'Access denied']]);
    }
        // File updates
        // Log::info('Received data:', $data);
        // $jsonData = json_encode($data);
        // $fileName = 'log_' . now()->format('Y-m-d_H-i-s') . '.json';
        // $directory = storage_path('logs');
        // if (!file_exists($directory)) {
        //     mkdir($directory, 0755, true);
        // }
        // file_put_contents("{$directory}/{$fileName}", $jsonData);

    return response()->json(['status' => ['code' => 200, 'errortext' => 'Updated successfully']]);
});