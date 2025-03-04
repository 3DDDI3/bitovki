<?php

namespace App\Http\Controllers;

use App\Models\Lending\Blog;
use App\Models\Lending\News;
use App\Models\Lending\Tour;
use App\Models\Medication;
use App\Models\MedicationPreview;
use App\Models\NewsPreview;
use App\View\Components\Template\Blocks\SearchBlock;
use GuzzleHttp\Client;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function index()
    {
        $breadCrumbs = collect([
            (object)[
                'name' => 'Главная',
                'url' => '/',
            ],
            (object)[
                'name' => 'Поиск',
            ],
        ]);

        $medicaions = MedicationPreview::query()
            ->whereHas('medication', function ($query) {
                $query->where(['hide' => 0]);
            })
            ->where('title', 'like', sprintf('%%%s%%', request()->search))
            ->orderBy('title')
            ->get();

        $news = News::query()
            ->whereHas('preview', function ($query) {
                $query->where('title', 'like', sprintf('%%%s%%', request()->search));
                $query->orWhere('description', 'like', sprintf('%%%s%%', request()->search));
            })->orWhere('text', 'like', sprintf('%%%s%%', request()->search))->get();

        $results = $medicaions->concat($news);

        if ($results->count() == 0) abort(404, 'Не удалось найти');

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $currentResults = $results->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $results = new LengthAwarePaginator($currentResults, $results->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return view('pages.search', [
            'breadCrumbs' => $breadCrumbs,
            'results' => $results,
        ]);
    }

    public function getMore()
    {
        $medicaions = MedicationPreview::query()
            ->whereHas('medication', function ($query) {
                $query->where(['hide' => 0]);
            })
            ->where('title', 'like', sprintf('%%%s%%', request()->search))
            ->orderBy('title')
            ->get();

        $news = News::query()
            ->whereHas('preview', function ($query) {
                $query->where('title', 'like', sprintf('%%%s%%', request()->search));
                $query->orWhere('description', 'like', sprintf('%%%s%%', request()->search));
            })->orWhere('text', 'like', sprintf('%%%s%%', request()->search))->get();

        $results = $medicaions->concat($news);

        if ($results->count() == 0) abort(404, 'Не удалось найти');

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 10;
        $currentResults = $results->slice(($currentPage - 1) * $perPage, $perPage)->all();

        $results = new LengthAwarePaginator($currentResults, $results->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        $searchBlock = new SearchBlock();

        if ($results->count() == 0)
            return response('', 200);

        foreach ($results as $result) {
            if (get_class($result) == "App\Models\MedicationPreview")
                $html[] = $searchBlock->render()->with([
                    'path' => $result->path,
                    'title' => $result->title,
                    'text' => $result->medication->description,
                    'href' => route('page', ['url' => 'medication', 'id' => $result->medication_id]),
                ]);
            if (get_class($result) == "App\Models\Lending\News")
                $html[] = $searchBlock->render()->with([
                    'path' => $result->preview->path,
                    'title' =>  $result->preview?->title,
                    'time' => $result->preview->created_at->format('d.m.Y'),
                    'text' => $result->preview->description,
                    'href' => route('page.new', ['url' => $result->preview->id]),
                ]);
        }

        if (empty($html))
            return response('', 200);

        $html = implode('', $html);

        return response($html);
    }
}
