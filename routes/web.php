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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/academic-years', 'HomeController@academic_years')->name('academic-years')->middleware('auth');
Route::post('/academic-years', 'HomeController@academic_years')->name('academic-years')->middleware('auth');

Route::get('/courses', 'HomeController@courses')->name('courses')->middleware('auth');
Route::post('/courses', 'HomeController@courses')->name('courses')->middleware('auth');

Route::get('/units', 'HomeController@units')->name('units')->middleware('auth');
Route::post('/units', 'HomeController@units')->name('units')->middleware('auth');

Route::get('/semesters', 'HomeController@semesters')->name('semesters')->middleware('auth');
Route::post('/semesters', 'HomeController@semesters')->name('semesters')->middleware('auth');

Route::get('/students', 'HomeController@students')->name('students')->middleware('auth');;
Route::post('/students', 'HomeController@students')->name('students')->middleware('auth');;

Route::get('/registration', 'HomeController@registration')->name('registration');
Route::post('/registration', 'HomeController@registration')->name('registration');

Route::get('/enrollments', 'HomeController@enrollments')->name('enrollments')->middleware('auth');
Route::post('/enrollments', 'HomeController@enrollments')->name('enrollments')->middleware('auth');
Route::get('/enrollments/print', 'HomeController@enrollments_print')->name('enrollments_print')->middleware('auth');
