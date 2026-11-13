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

Route::get('/', [App\Http\Controllers\MainMenuController::class, 'mainPage'])->name('home');

Route::get('portfolio', 'MainMenuController@mainPage');
Route::get('contacts', 'MainMenuController@mainPage');
Route::get('/page/{id}', 'MainMenuController@onePage');
Route::get('sitemap.xml', 'SitemapController@index');
Route::get('llms.txt', 'SitemapController@llms');

// Google API
Route::get('/admin/google/scan', 'GoogleSafeBrowsingController@scanIndex');
Route::get('/admin/google/submit-for-indexing', 'GoogleSafeBrowsingController@submitIndex');
Route::post('/admin/google/scan', 'GoogleSafeBrowsingController@scanLink')->name('scanGoogle');;
Route::post('/admin/google/submit-for-indexing', 'GoogleSafeBrowsingController@submitForIndexing')->name('submitGoogle');
// Google API

Route::resource('admin/portfolio', PortfolioController::class);
Route::resource('admin/page', PagesDatasController::class);
Route::get('/welcome', function () {
    return view('welcome');
});

Auth::routes();

Route::get('admin/', [App\Http\Controllers\HomeController::class, 'index'])->name('admin');

Route::get('/welcome', function () {
    return view('welcome');
});
