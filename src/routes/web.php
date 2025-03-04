<?php

use App\Filters\MedicationFilter;
use App\Filters\SameFilter;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ToursController;
use App\Jobs\Parse;
use App\Models\Lending\Tour;
use App\Models\Medication;
use App\Models\Services\Agent;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::match(['get', 'post'], '/', [IndexController::class, 'index'])->name('index');

    Route::prefix('pages')->group(function () {
        Route::get('/{url}', [PageController::class, 'index'])->name('page');
    });

    Route::get('/search', [SearchController::class, 'index']);

    Route::get('pages/news/{url}', [NewsController::class, 'index'])->name('page.new');
});
