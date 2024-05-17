<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\DeviceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', [HomeController::class, 'home'])->name('dashboard');
	Route::get('chart', [HomeController::class, 'chart'])->name('chart');
	Route::get('/medical-records', [HomeController::class, 'records']);
	Route::get('/edit-medical-records', [HomeController::class, 'edit']);
	Route::get('/edit-connected-contact-{contact_id}', [HomeController::class, 'editContact'])->name('contact.edit');

	Route::get('/user-management', [InfoUserController::class, 'management']);
	Route::get('/contact-management', [InfoUserController::class, 'contact']);
	Route::get('/devices-management', [DeviceController::class, 'devices']);
	Route::get('/search-user', 'App\Http\Controllers\InfoUserController@search')->name('searchUser');
	Route::get('/search-contact', 'App\Http\Controllers\HomeController@search')->name('searchContact');
	Route::get('/updateStatus/{user_id}', 'App\Http\Controllers\InfoUserController@updateStatus')->name('updateStatus');
	Route::get('/updateLevel/{user_id}', 'App\Http\Controllers\InfoUserController@updateLevel')->name('updateLevel');

	Route::delete('/delete/{user_id}', 'App\Http\Controllers\InfoUserController@destroy')->name('userDestroy');
	Route::delete('/delete/{contact_id}', 'App\Http\Controllers\InfoUserController@contactDestroy')->name('delete-contact');

	Route::get('devices-add', function () {
		return view('laravel-examples/devices-add');
	})->name('devices-add');

	Route::post('/devices/add', [DeviceController::class, 'store'])->name('devices.store');

	Route::get('add-connected-contact', function () {
		return view('laravel-examples/user-contact');
	})->name('user-contact');

	Route::post('/records/store', [HomeController::class, 'store'])->name('records.store');
	Route::post('/contact/store', [HomeController::class, 'addContact'])->name('contact.store');
	Route::put('/records/update', [HomeController::class, 'update'])->name('records.update');
	Route::put('/contact/update', [HomeController::class, 'updateContact'])->name('contact.update');

	Route::delete('/contact/{contact_id}', 'App\Http\Controllers\HomeController@destroy')->name('contact.destroy');

	Route::get('billing', function () {
		return view('billing');
	})->name('billing');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('rtl', function () {
		return view('rtl');
	})->name('rtl');

	// Route::get('user-management', function () {
	// 	return view('laravel-examples/user-management');
	// })->name('user-management');

	Route::get('tables', function () {
		return view('tables');
	})->name('tables');

    Route::get('virtual-reality', function () {
		return view('virtual-reality');
	})->name('virtual-reality');

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');