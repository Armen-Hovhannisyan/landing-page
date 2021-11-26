<?php

use App\Http\Controllers\Admin\PagesAddController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\PagesEditController;
use App\Http\Controllers\Admin\PortfolioAddController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\PortfolioEditController;
use App\Http\Controllers\Admin\ServiceAddController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServiceEditController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PageController;
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


Route::group(['middleware' => 'web'], function (){
    Route::match(['get','post'], '/', [IndexController::class , 'execute']);
    Route::post( '/contact-form', [IndexController::class , 'contactForm'])->name('contact.form');
    Route::get( '/page/{alias}', [PageController::class, 'execute'])->name('page');
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function (){
    Route::get('/', function () {

    });
    Route::group(['prefix' => 'pages'], function (){
        Route::get( '/', [PagesController::class, 'execute']);
        Route::match(['get','post'], '/add', [PagesAddController::class, 'execute']);
        Route::match(['get','post','delete'], '/edit/{page}', [PagesEditController::class, 'execute']);
    });
    Route::group(['prefix' => 'portfolios'], function (){
        Route::get( '/', [PortfolioController::class, 'execute']);
        Route::match(['get','post'], '/add', [PortfolioAddController::class, 'execute']);
        Route::match(['get','post','delete'], '/edit/{portfolio}', [PortfolioEditController::class, 'execute']);
    });
    Route::group(['prefix' => 'services'], function (){
        Route::get( '/', [ServiceController::class, 'execute']);
        Route::match(['get','post'], '/add', [ServiceAddController::class, 'execute']);
        Route::match(['get','post','delete'], '/edit/{service}', [ServiceEditController::class, 'execute']);
    });
});
