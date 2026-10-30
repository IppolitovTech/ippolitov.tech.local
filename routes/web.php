<?php

use App\Http\Controllers\GoogleSafeBrowsingController;
use App\Http\Controllers\MainMenuController;
use App\Http\Controllers\PagesDatasController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SitemapController;
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

Route::get('portfolio', [MainMenuController::class, 'mainPage']);
Route::get('contacts', [MainMenuController::class, 'mainPage']);
Route::get('/page/{id}', [MainMenuController::class, 'onePage']);
Route::get('sitemap.xml', [SitemapController::class, 'index']);

// Google API
Route::get('/admin/google/scan', [GoogleSafeBrowsingController::class, 'scanIndex']);
Route::get('/admin/google/submit-for-indexing', [GoogleSafeBrowsingController::class, 'submitIndex']);
Route::post('/admin/google/scan', [GoogleSafeBrowsingController::class, 'scanLink'])->name('scanGoogle');;
Route::post('/admin/google/submit-for-indexing', [GoogleSafeBrowsingController::class, 'submitForIndexing'])->name('submitGoogle');
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
