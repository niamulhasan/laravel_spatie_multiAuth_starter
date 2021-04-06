<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard_old', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard_old');

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::resource('roles', 'App\Http\Controllers\RolesController', ['names' => 'dashboard.roles']);
    Route::resource('users', 'App\Http\Controllers\UsersController', ['names' => 'dashboard.users']);
    Route::resource('admins', 'App\Http\Controllers\AdminsController', ['names' => 'dashboard.admins']);

    Route::get('/login', 'App\Http\Controllers\AdminAuth\AuthenticatedSessionController@showLoginForm')->name('dashboard.login');
    Route::post('/login/submit', 'App\Http\Controllers\AdminAuth\AuthenticatedSessionController@login')->name('dashboard.login.submit');

    Route::post('/logout/submit', 'App\Http\Controllers\AdminAuth\AuthenticatedSessionController@logout')->name('dashboard.logout.submit');

    // Route::get('/password/reset', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('dashboard.login');
    // Route::post('/login/submit', 'App\Http\Controllers\Auth\LoginController@login')->name('dashboard.login.submit');
});

require __DIR__ . '/auth.php';
