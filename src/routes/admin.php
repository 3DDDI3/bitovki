<?php

use App\Http\Controllers\Admin\AdminAjax;
use App\Http\Controllers\Admin\Auxiliary\PersonController;
use App\Http\Controllers\Admin\Auxiliary\SpecialtyController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auxiliary\MedicationTypeController;
use App\Http\Controllers\Feedback\CompanyController;
use App\Http\Controllers\Feedback\ContactController;
use App\Http\Controllers\Feedback\PharmacovigilanceController;
use App\Http\Controllers\Main\MedicationController;
use App\Http\Controllers\Main\NewsController;
use App\Http\Controllers\Main\PageController;
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

                Route::prefix('news')
                    ->name('news.')
                    ->group(function () {
                        Route::get('/', [NewsController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], '/edit{id?}', [NewsController::class, 'edit'])->name('edit');
                    });

                Route::prefix('medication')
                    ->name('medication.')
                    ->group(function () {
                        Route::get('/', [MedicationController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], '/edit{id?}', [MedicationController::class, 'edit'])->name('edit');
                    });
            });

        Route::prefix('auxiliary')
            ->name('auxiliary.')
            ->group(function () {
                Route::prefix('staff')
                    ->name('staff.')
                    ->group(function () {
                        Route::get('/', [PersonController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], '/edit{id?}', [PersonController::class, 'edit'])->name('edit');
                    });

                Route::prefix('specialties')
                    ->name('specialties.')
                    ->group(function () {
                        Route::get('/', [SpecialtyController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], '/edit{id?}', [SpecialtyController::class, 'edit'])->name('edit');
                    });

                Route::prefix('medication-types')
                    ->name('medication-types.')
                    ->group(function () {
                        Route::get('/', [MedicationTypeController::class, 'index'])->name('index');
                        Route::match(['get', 'post'], '/edit{id?}', [MedicationTypeController::class, 'edit'])->name('edit');
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
