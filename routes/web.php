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

use App\User;
use Illuminate\Foundation\Auth\User as AuthUser;

Route::get('/', 'WelcomeController@index');

//Route::get('/logout', function () {
  //  return view('welcome');
//});
Route::get('/about', function () {
    return view('page.about');
});
Route::get('test', function () {
    $user=\App\User::find(1);
   // return $user->shippingAdresses;
    return new \App\Mail\NewUserRegistered();
});
Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::post('language', 'LanguageController@setLanguage')->name('language');
Route::get('confirm/{token}', 'ConfirmControllerEmail@confirm')->name('email_confirmation');
//Route::get('profile', 'UserProfileController@show')->name('profile');
//::post('profile/address', 'UserProfileController@updateAddress')->name('profile-address');

Route::get('profile', 'ProfileController@show')->name('profile');
Route::post('profile/settings', 'ProfileController@updateSettings')->name('update-settings');
Route::get('course', 'TeacherController@index')->name('course');
Route::get('courseCategories', 'CourseCategoryController@index')->name('courseCategories');
Route::post('courseCategories', 'CourseCategoryController@store');
Route::put('courseCategories', 'CourseCategoryController@edit');
Route::delete('courseCategories', 'CourseCategoryController@delete');
Route::post('profile/address', 'ProfileController@updateAddress')->name('update-address');
Route::get('newcourse/{course?}', 'CourseController@show')->name('newcourse');
Route::get('courses', 'CourseController@index')->name('courses');
Route::put('courses-store', 'CourseController@update')->name('courses-store');
Route::delete('courses-store', 'CourseController@delete')->name('courses-store');
Route::post('courses-store', 'CourseController@store')->name('courses-store');
Route::post('course-content/{course}/sections', 'SectionController@store')->name('new-section');
Route::get('course-content/{course}', 'CourseController@courseContent')->name('course-content');
Route::post('lessons', 'LessonsController@store')->name('lessons');
Route::post('switch-index', 'LessonsController@switchIndex');
Route::post('switch-index-section', 'SectionController@switchIndex');
Route::delete('sections/delete', 'SectionController@delete')->name('delete-section');;
Route::delete('lessons/delete', 'LessonsController@delete')->name('delete-lesson');;
Route::get('more-course', 'CourseController@moreCourse')->name('more-course');
Route::get('more-course/{course}', 'CourseController@oneCourse')->name('one-course');
Route::get('checkout/{amount}', 'CourseController@checkout')->name('course.checkout')->middleware('auth');
Route::post('/charge', 'CourseController@charge')->name('cart.charge');
Route::delete('/shoppingcart/{course}', 'CourseController@deleteProduct')->name('delete.product');
Route::put('/shoppingcart/{course}', 'CourseController@updateProduct')->name('update.product');

//carte route
Route::post('/panier/ajouter', 'CartController@store')->name('carte.store');
Route::get('/shoppingcart', 'CartController@index')->name('carte.index');
//order
Route::get('/order', 'OrderController@index')->name('order.index');






