<?php

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

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::get('/admin/dashboard',function() {
  return view ('admin.dashboard');
});

Route::get('/admin/festsetup', function () {
    return view('admin.festsetup');
});

// Route::get('/admin/event', function () {
//     return view('admin.event.index');
// });

Route::resource('/admin/event','EventController');

Route::get('/admin/eventHead', function () {
    return view('admin.eventHead');
});

Route::get('/admin/college', function () {
    return view('admin.college');
});
