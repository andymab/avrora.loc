<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\MgroupController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [MgroupController::class, 'index'])->name('index');

Route::resource('/catalog','\App\Http\Controllers\CatalogController');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//так можно группировать то что может админ
// Route::group(['middleware' => ['admin']], function () {
//     Route::get('admin-view', 'HomeController@adminView')->name('admin.view');
// });
