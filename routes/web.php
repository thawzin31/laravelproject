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

// Route::get('/', function () {
//     return view('welcome');
//     //return "Hello World";
// })->name('home');

// Route::get('testing', function () {
//     return view('testing');
//     //return "Testing page";
// })->name('testing');

// Route::get('/',"MainController@welcome")->name('home');

// Route::get('testing',"MainController@testing")->name('testing');

// Route::get('about',"MainController@about")->name('about');

// Route::get('contact',"MainController@contact")->name('contact');

Route::middleware('role:admin')->group(function(){
//for CRUD process(item management)
	Route::resource('brand','BrandController');

	Route::resource('category','CategoryController');

	Route::resource('subcategory','SubCategoryController');

	Route::resource('item','ItemController');

	Route::post('filter','ItemController@filterCategory')->name('filterCategory');
});

Auth::routes();//['register'=>false]

Route::get('home','HomeController@index')->name('home');

//brand=URI
//BrandController=controller class name


//frontend with items
Route::get('/',"FrontendController@home")->name('mainpage');

Route::get('signin','FrontendController@signin')->name('signinpage');

Route::get('signup','FrontendController@signup')->name('signuppage');



Route::resource('user','UserController');

Route::get('itemdetail/{id}','FrontendController@itemdetail')->name('itemdetail');

Route::get('itemsbysubcategory/{id}','FrontendController@itemsbysubcategory')->name('itemsbysubcategory');


Route::get('cart','FrontendController@cart')->name('cartpage');

//ajax
Route::get('bysubcategory','FrontendController@bysubcategory')->name('bysubcategory');

//cart order
Route::resource('order','OrderController');

Route::post('confirm/{id}','OrderController@confirm')->name('order.confirm');