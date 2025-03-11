<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\CompanyContact;
use App\Models\Constructor\Page;
use App\Models\Main\Infographic;
use App\Models\Main\Page as MainPage;
use App\Models\SEO;
use App\Models\Setting;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\TwitterCard;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::componentNamespace('App\\View\\Components\\Template\\Blocks', 'blocks');
        Blade::componentNamespace('App\\View\\Components\\Admin', 'admin');

        Schema::defaultStringLength(191);

        if (\App::runningInConsole()) return; //чтобы не было проблем с миграциями

        $this->app->bind(\App\Contracts\Pages::class, fn() => new Pages(
            new \App\Models\Page\Page(),
            new \Request()
        ));

        if (Request::ajax()) return;

        $setting = Setting::find(1);

        // $seo = new \App\Services\SEO\SEO(
        //     SEO::where('url', Request::path())->first(),
        //     new SEOMeta(),
        //     new OpenGraph(),
        //     new TwitterCard(),
        //     new JsonLd()
        // );
        // $seo->buildSets();

        $setting = Setting::query()->find(1);
        // $pages = Page::query()
        //     ->orderBy('rating')
        //     ->get();

        $page = MainPage::query()->find(1);

        $infographics = Infographic::query()
            ->where(['hide' => 0])
            ->orderBy('id')
            ->get();

        // View::composer('includes.head', fn($view) => $view->with(['seo' => $seo]));
        View::composer('layouts.default', fn($view) => $view->with([
            // 'seo' => $seo,
            'page' => $page,
            'infographics' => $infographics,
            'setting' => $setting,
        ]));
    }
}
