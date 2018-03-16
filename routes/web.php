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

// Route::get('/fest',function() {
//   return view ('parti.index');
// });
//
Route::post('/fest/events/finalize',function() {
  return view ('parti.temp');
});

Route::get('/fest','RegController@index');

// Route::get('/fest/events','RegController@index');
Route::post('/fest/college','RegController@getCount');
Route::get('/fest/college','RegController@getCount');
Route::post('/fest/events','RegController@getEventList');

// Route::get('/fest/events','RegController@getEventList');
Route::post('/fest/final','RegController@store');
// Route::get('/fest/final',function() {
//   return view ('parti.final');
// });

// Route::get('/fest/events','RegController@store');

// Route::post('/fest/events/finalize');
// Route::post('/fest/eve/getData','RegController@getData');
// Route::resource('/fest/college','RegController');
// Route::post('/fest/events',function() {
//   return view ('parti.events');
// });

// Route::get('/fest/events/getEventList','RegController@get');

// Route::get('/fest/college',function() {
//   return view ('parti.college');
// });

// Route::get('/admin/festsetup/index', function () {
//     return view('admin.festsetup');
// });
//
// Route::get('/admin/event/index', function () {
//     return view('admin.event');
// });

Route::resource('/admin/event','EventController');
Route::resource('/admin/festsetup','FestController');
Route::resource('/admin/eventhead','EventHeadController');
Route::resource('/admin/college','CollegeController');


Route::get('/admin/college', function () {
    return view('admin.college');
});

Route::get('/events',function() {
  return view ('events.layout.main');
});

Route::get('/results',function() {
  return view ('results.layout.main');
});


Route::resource('/results/eventresults','ResultController');
Route::get('/events/volunteers','IndividualEventController@indexvolunteer');
Route::resource('/events/participants','IndividualEventController');
Route::get('/events/schedule','IndividualEventController@indexschedule');
Route::get('/events/presentparticipants','IndividualEventController@indexpresent');
