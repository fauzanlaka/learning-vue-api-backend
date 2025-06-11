<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReadStorageFileController;

// Route::get('/', function () {
//     return ['Laravel' => app()->version()];
// });

Route::get("/readStorageFile/{file_path}/{file_name}", [ReadStorageFileController::class, 'readStorageFile']);

// require __DIR__.'/auth.php';
