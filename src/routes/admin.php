<?php

use App\Http\Controllers\Admin\AdminAjax;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\Main\AdditionalOptionController;
use App\Http\Controllers\Admin\Main\CatalogController;
use App\Http\Controllers\Admin\Main\InfographicController;
use App\Http\Controllers\Admin\Main\InformationController;
use App\Http\Controllers\Admin\Main\OurWorkController;
use App\Http\Controllers\Admin\Main\PageController;
use App\Http\Controllers\Admin\Main\QAController;
use App\Http\Controllers\Admin\Main\ReviewController;
use App\Http\Controllers\Admin\Main\VariantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Feedback\CompanyController;
use App\Http\Controllers\Feedback\ContactController;
use App\Http\Controllers\Feedback\PharmacovigilanceController;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::post('ajax', function (Request $request) {
            $controller = new AdminAjax();
            $controller($request->action);
        })->withoutMiddleware([VerifyCsrfToken::class]);

        Route::get('/', function () {
            return redirect()->route(auth()->check() ? 'admin.services.settings.index' : 'admin.login');
        });

        Route::post('login', [LoginController::class, 'login']);
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('login', [AdminLoginController::class, 'login'])->name('login');
    });

Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin', 'admin_access'])
    ->group(function () {
        Route::prefix('main')
            ->name('main.')
            ->middleware(['auth', 'admin', 'admin_access'])
            ->group(function () {
                Route::prefix('pages')
                    ->name('pages.')
                    ->group(function () {
                        Route::get('/', [PageController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], '/edit{id?}', [PageController::class, 'edit'])->name('edit');
                    });

                Route::prefix('qa')
                    ->name('qa.')
                    ->group(function () {
                        Route::get('/', [QAController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], '/edit{id?}', [QAController::class, 'edit'])->name('edit');
                    });

                Route::prefix('our-works')
                    ->name('our-works.')
                    ->group(function () {
                        Route::get('/', [OurWorkController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], '/edit{id?}', [OurWorkController::class, 'edit'])->name('edit');
                    });

                Route::prefix('variants')
                    ->name('variants.')
                    ->group(function () {
                        Route::get('/', [VariantController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], '/edit{id?}', [VariantController::class, 'edit'])->name('edit');
                    });

                Route::prefix('reviews')
                    ->name('reviews.')
                    ->group(function () {
                        Route::get('/', [ReviewController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], '/edit{id?}', [ReviewController::class, 'edit'])->name('edit');
                    });

                Route::prefix('informations')
                    ->name('informations.')
                    ->group(function () {
                        Route::get('/', [InformationController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], '/edit{id?}', [InformationController::class, 'edit'])->name('edit');
                    });

                Route::prefix('catalog')
                    ->name('catalog.')
                    ->group(function () {
                        Route::get('/', [CatalogController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], '/edit{id?}', [CatalogController::class, 'edit'])->name('edit');
                    });

                Route::prefix('additional-options')
                    ->name('additional-options.')
                    ->group(function () {
                        Route::get('/', [AdditionalOptionController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], '/edit{id?}', [AdditionalOptionController::class, 'edit'])->name('edit');
                    });

                Route::prefix('infographics')
                    ->name('infographics.')
                    ->group(function () {
                        Route::get('/', [InfographicController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], '/edit{id?}', [InfographicController::class, 'edit'])->name('edit');
                    });
            });

        Route::prefix('services')
            ->name('services.')
            ->group(function () {
                Route::prefix('users')
                    ->name('users.')
                    ->group(function () {
                        Route::get('/', [UsersController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], '/edit/{id?}', [UsersController::class, 'edit'])->name('edit');
                    });

                Route::prefix('settings')
                    ->name('settings.')
                    ->group(function () {
                        Route::match(['get', 'post'], '/', [SettingsController::class, 'index'])->name('index');
                    });
            });

        Route::prefix('feedback')
            ->name('feedback.')
            ->group(function () {
                Route::prefix('pharmacovigilance')
                    ->name('pharmacovigilance.')
                    ->group(function () {
                        Route::get('/', [PharmacovigilanceController::class, 'index'])->name('index');
                    });

                Route::prefix('company')
                    ->name('company.')
                    ->group(function () {
                        Route::get('/', [CompanyController::class, 'index'])->name('index');
                    });

                Route::prefix('contact')
                    ->name('contact.')
                    ->group(function () {
                        Route::get('/', [ContactController::class, 'index'])->name('index');
                    });
            });
    });
