<?php

use Illuminate\Http\Request;
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
    return view('welcome');
});

Route::post("/upload", function (Request $request) {
    $file = $request->file('filepond');
    $filename = $file->getClientOriginalName();
    $file->move('uploads', $filename);

    // Add any additional logic here

    return response()->json(['success' => true]);
});
