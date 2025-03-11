<?php

use App\Http\Controllers\Admin\Api\ImageController;
use App\Http\Controllers\Admin\Api\RequestController;
use App\Http\Controllers\CatalogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('images')
    ->controller(ImageController::class)
    ->group(function () {
        Route::post('/', 'save');
        Route::delete('/', 'delete');
        Route::patch('/swap-files', 'swapFiles');
    });;

Route::withoutMiddleware('api')
    ->prefix('catalog')
    ->group(function () {
        Route::get('/', [CatalogController::class, 'index']);
    });

Route::withoutMiddleware('api')
    ->prefix('request')
    ->group(function () {
        Route::post('/create', [RequestController::class, 'create']);
    });

Route::withoutMiddleware('api')
    ->prefix('service')
    ->group(function () {
        Route::get('/getImage', [CatalogController::class, 'getImage']);
    });
