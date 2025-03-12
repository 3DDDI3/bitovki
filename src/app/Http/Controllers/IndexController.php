<?php

namespace App\Http\Controllers;

use App\Models\Main\AdditionalOption;
use App\Models\Main\Information;
use App\Models\Main\Item;
use App\Models\Main\OurWork;
use App\Models\Main\Page;
use App\Models\Main\QA;
use App\Models\Main\Review;
use App\Models\Main\Variant;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $page = Page::query()->find(1);

        $additionalOptions = AdditionalOption::query()
            ->where(['hide' => 0])
            ->orderBy('id')
            ->get();

        $reviews = Review::query()
            ->where(['hide' => 0])
            ->orderBy('id')
            ->get();

        $informations = Information::query()
            ->where(['hide' => 0])
            ->orderBy('id')
            ->get();

        $informations = $informations->split(round($informations->count() / 2));

        $variants = Variant::query()
            ->where(['hide' => 0])
            ->orderBy('id')
            ->get();

        $ourWorks = OurWork::query()
            ->where(['hide' => 0])
            ->orderBy('id')
            ->get();

        $qa = QA::query()
            ->where(['hide' => 0])
            ->orderBy('rating', 'desc')
            ->get();

        $items = Item::query()
            ->where(['hide' => 0])
            ->orderBy('rating', 'desc')
            ->paginate(5);

        return view('pages.index', [
            'page' => $page,
            'additionalOptions' => $additionalOptions,
            'reviews' => $reviews,
            'informations' => $informations,
            'variants' => $variants,
            'ourWorks' => $ourWorks,
            'qa' => $qa,
            'items' => $items,
        ]);
    }
}
