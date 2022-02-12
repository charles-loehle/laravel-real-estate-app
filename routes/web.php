<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CategoryController;
// use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\FrontPropertyListController;

Auth::routes();

// Frontend User routes
Route::get('/home', [HomeController::class, 'index'])->name('home');// auth protected
Route::get('/', [FrontPropertyListController::class, 'index']);
Route::get('/property/{id}', [FrontPropertyListController::class, 'show'])->name('property.show');
Route::get('/search', [SearchController::class, 'search'])
  ->name('search');

// Admin routes
Route::group(['prefix' => 'auth', 'middleware' => ['auth', 'isAdmin']], function () {
  Route::get('/dashboard', function () {
    return view('admin.dashboard');
  });
  Route::resource('category', CategoryController::class);
  // Route::resource('subcategory', SubCategoryController::class);
  Route::resource('property', PropertyController::class);
});