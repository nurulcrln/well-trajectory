<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BuildHoldController;
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

// Route::get('/', function () {
//     return view('buildHold');
// });
Route::get('/', [BuildHoldController::class, 'index']);
Route::get('/', [BuildHoldController::class, 'calcbuildhold']);
Route::post('/calcbuildhold', [BuildHoldController::class, 'calcbuildhold']);


