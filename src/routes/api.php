<?php

use App\Http\Controllers\Admin\Api\BlockController;
use App\Http\Controllers\Admin\Api\ImageController;
use App\Http\Controllers\Admin\Api\PersonalController;
use App\Http\Controllers\Admin\Api\SocialNetworkController;
use App\Http\Controllers\Api\RequestController;
use App\Http\Controllers\Feedback\ExportFeedbackController;
use App\Http\Controllers\Main\MedicationController;
use App\Http\Controllers\Main\NewsController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\SearchController;
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

Route::prefix('blocks')
    ->controller(BlockController::class)
    ->group(function () {
        Route::post('/', 'create');
        Route::delete('/', 'delete');
        Route::post('/change-sequence', 'changeSequence');
        Route::patch('/swap', 'swap');
        Route::patch('/swap-files', 'swapFiles');
    });

Route::prefix('images')
    ->controller(ImageController::class)
    ->group(function () {
        Route::post('/', 'save');
        Route::delete('/', 'delete');
        Route::patch('/change-sequence', 'changeSequence');
    });

Route::prefix('personal')
    ->controller(PersonalController::class)
    ->group(function () {
        Route::delete('/', 'detach');
        Route::post('/', 'attach');
    });

Route::withoutMiddleware('api')
    ->prefix('request')
    ->controller(RequestController::class)
    ->group(function () {
        Route::post('/pharmacovigilance', 'pharmacovigilance');
        Route::post('/company', 'company');
        Route::post('/contact', 'contact');
    });

Route::prefix('medications')
    ->group(function () {
        Route::get('/getMore', [MedicationController::class, 'getMore']);
    });

Route::prefix('news')->group(function () {
    Route::get('getMore', [NewsController::class, 'getMore']);
});

Route::prefix('search')->group(function () {
    Route::get('getMore', [SearchController::class, 'getMore']);
});

Route::prefix('researches')->group(function () {
    Route::post('/create', [MedicationController::class, 'researchCreate']);
    Route::delete('/delete', [MedicationController::class, 'researchDelete']);
});

Route::prefix('main-list')->group(function () {
    Route::post('/create', [MainPageController::class, 'create']);
    Route::delete('/delete', [MainPageController::class, 'delete']);
});

Route::prefix('video')
    ->controller(MainPageController::class)
    ->group(function () {
        Route::post('', 'videoAttach');
        Route::delete('', 'videoDetach');
    });

Route::prefix('social-network')
    ->controller(SocialNetworkController::class)
    ->group(function () {
        Route::post('', 'create');
        Route::delete('', 'delete');
    });

Route::prefix('feedbacks/export')
    ->group(function () {
        Route::get('/company', [ExportFeedbackController::class, 'exportCompany']);
        Route::get('/contact', [ExportFeedbackController::class, 'exportContact']);
        Route::get('/pharmacovigilance', [ExportFeedbackController::class, 'exportPharmacovigilanceController']);
    });
