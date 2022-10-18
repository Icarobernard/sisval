<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
	})->name('table');

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');
	Route::get('projects', function (Project $project) {
		return view('project.index', ['data' => ProjectController::show($project)]);
	})->name('project');

	Route::get('register/project', function () {
		return view('project.register');
	})->name('registerProject');

	Route::get('register/success', function () {
		return view('project.success');
	})->name('success');
	// Route::put('project/edit', ['as' => 'project.update', 'uses' => 'App\Http\Controllers\ProjectController@update']);
	Route::get('project/{id}', ['as' => 'project.find', 'uses' => 'App\Http\Controllers\ProjectController@find']);
	Route::post('project', ['as' => 'project.create', 'uses' => 'App\Http\Controllers\ProjectController@create'], function () {
		return view('project.index');
	});
	Route::post('project/{id}/edit', ['as' => 'project.update', 'uses' => 'App\Http\Controllers\ProjectController@pitaUpdate']);
	Route::post('project/royalty', ['as' => 'project.royalty', 'uses' => 'App\Http\Controllers\ProjectController@royalty']);
	Route::post('project/fcd', ['as' => 'project.fcd', 'uses' => 'App\Http\Controllers\ProjectController@fcd']);
	Route::post('project/pita', ['as' => 'project.pita', 'uses' => 'App\Http\Controllers\ProjectController@pita']);
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});