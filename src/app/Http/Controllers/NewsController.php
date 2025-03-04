<?php

namespace App\Http\Controllers;

use App\Models\Lending\News;
use App\Models\News as ModelsNews;

class NewsController extends Controller
{
    public function index(string $url)
    {
        $breadCrumbs = collect([
            (object)[
                'name' => 'Главная',
                'url' => '/',
            ],
            (object)[
                'name' => 'Новости',
                'url' => '/pages/news'
            ],
            (object)[
                'name' => ModelsNews::query()->find($url)->preview?->title
            ]
        ]);


        $new = News::query()
            ->where(['hide' => 0, 'id' => $url])
            ->first();

        if (!$new)
            abort(404);

        $otherNews = News::query()
            ->whereKeyNot($url)
            ->orderBy('created_at', 'desc')
            ->take(2)
            ->get();

        return view('pages.new', [
            'new' => $new,
            'otherNews' => $otherNews,
            'breadCrumbs' => $breadCrumbs,
        ]);
    }
}
